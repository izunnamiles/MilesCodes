<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {
        $postCount= Cache::remember('count.posts.'.$user->id,
            now()->addSeconds(30),
            function ()use ($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('counts.followers.'.$user->id,
            now()->addSeconds(30),
            function ()use ($user){
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('counts.following.'.$user->id,
            now()->addSeconds(30),
            function ()use ($user){
                return $user->following->count();
            });
        //$user = User::findOrfail($user);
        $follows =(auth()->user())? (auth()->user()->following->contains($user->id)): false;
        return view('profiles.index', compact('user','follows','postCount','followersCount','followingCount'));
    }


    public function edit(User $user){

        $this->authorize('update',$user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user){

        $this->authorize('update',$user->profile);
        $data = request()->validate([
           'title'=> 'required',
           'description' => 'required',
            'url'=>'url',
            'image'=> '',
        ]);

        if(request('image')){
            $imgPath = request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imgPath}"))->fit(150,150);
            $image->save();

        }
        Auth()->user()->profile->update(array_merge(
            $data,
            ['image'=> $imgPath]
        ));
        return redirect("/profile/{$user->id}");





    }
}
