<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //

    public function _construct(){
        $this->middleware('auth');

    }
    public function index(){
        if($this->middleware('auth')){
            $user = auth()->user()->following()->pluck('profiles.user_id');
            $posts = Post::whereIn('user_id',$user)->with('user')->latest()->paginate(10);
            return view('posts.index', compact('posts'));
        }else {
            return redirect('/login');
        }

    }

    public function create(){
        return view('posts.create');
    }
    public function store(){
        $data = request()->validate([
            'caption'=> 'required|max:255',
            'image' => 'required|image',
        ]);

        $imgPath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imgPath}"))->fit(250,250);
        $image->save();

         Auth()->user()->posts()->create([
             'caption'=> $data['caption'],
             'image'=> $imgPath
         ]);

         return redirect('/profile/'.auth()->user()->id);

        //Post::create($data);
        //dd(request()->all());
    }

    public function show(Post $post){

        return view('posts.show',compact('post'));

    }


}
