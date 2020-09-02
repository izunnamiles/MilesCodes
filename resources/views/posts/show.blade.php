@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" title="{{$post->caption}}" class="w-100" style="max-height: 70%">
            </div>
            <div class="col-4">
                <div class="d-flex pb-4">
                    <div>
                        <img src="{{$post->user->profile->profileImage()}}" class="w-75 rounded-circle" style="max-height: 50px">
                    </div>
                    <h5 class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}} .</span></a>
                    </h5>
                    @if(Auth()->user()->id !== $post->user->id)
                    <a href="#" class="pl-2">follow</a>
                        @endif
                </div>
                <hr>
                <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->caption}}</p>
            </div>
        </div>
    </div>
@endsection