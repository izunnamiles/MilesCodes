@extends('layouts.app')

@section('content')
<div class="container">
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Dashboard') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ __('You are logged in!') }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="max-height:100px;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user ->username}}</div>
                    <follow-button user-id="{{$user->id}}"follow="{{$follows}}"></follow-button>
                </div>
                @can('update',$user->profile)
                <div><a href="/p/create">Post</a></div>
                    @endcan


            </div>
            <div class="d-flex">
                <div class="pr-3">
                    <strong>{{$postCount}}</strong> posts
                </div>
                <div class="pr-3">
                    <strong>{{$followersCount}}</strong> followers
                </div>
                <div class="pr-3">
                    <strong>{{$followingCount}}</strong> following
                </div>
            </div>
            <div class="pt-3 font-weight-bold">{{$user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>

            @can('update', $user->profile)
            <div>
                <a href="/profile/{{$user->id}}/edit">Update profile</a>
            </div>
                @endcan

        </div>
    </div>
    {{--<div class="row pt-5">--}}
        {{--<div class="col-4 w-100">--}}
            {{--<img src="https://images.unsplash.com/photo-1540971047100-094a9c353635?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"style="max-height:70%; max-width:100%" alt="">--}}
        {{--</div>--}}
        {{--<div class="col-4 w-100">--}}
            {{--<img src="https://cdn.vox-cdn.com/thumbor/9gDWB7HKB7GJv3Y68baoGyLuVMU=/1400x0/filters:no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/9985205/lin_2048.png" style="max-height:70%; max-width:100%"alt="">--}}
        {{--</div>--}}
        {{--<div class="col-4 w-100">--}}
            {{--<img src="https://www.adelaidereview.com.au/app/uploads/2019/05/Image-of-a-supermassive-black-hole-created-from-data-captured-by-the-Event-Horizon-Telescope-EHT-850x850.jpg" style="max-height:70%; max-width:100%" alt="">--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 w-100 pb-4">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" title="{{$post->caption}} "></a>
        </div>
        @endforeach
    </div>
</div>

@endsection
