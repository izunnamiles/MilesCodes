@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row pb-2">
                <div class="col-8 offset-2 d-flex">
                    <a href="/profile/{{$post->user->id}}">
                        <img src="{{$post->user->profile->profileImage() }}" class="w-75 rounded-circle" style="max-height: 50px">
                    </a>
                    <h6>
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">
                             {{$post->user->username}}
                            </span>
                        </a>
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <img src="/storage/{{$post->image}}" title="{{$post->caption}}" class="w-80">
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-8 offset-2">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a>
                        </span> {{$post->caption}}
                    </p>
                </div>

            </div>

        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>

    </div>
@endsection