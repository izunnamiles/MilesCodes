<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(User $user){

         return Auth()->user()->following()->toggle($user->profile);

    }
}
