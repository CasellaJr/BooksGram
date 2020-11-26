@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{ $user->profile->profileImage() }}" style = "height:150px" class = "rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class = "d-flex align-items-center pb-3">
                    <div class = "h4">{{ $user -> username}}</div>

                <follow-button user-id = "{{ $user->id }}" follows = "{{ $follows }}"></follow-button> <!--component; no refresh required-->
                </div>

                @can ('update', $user->profile) <!--true or false for authorize that link. /profile/1 for hide "add new post" to unlogged users, and other users-->
                   <!--  <a href="/p/create">Add New Post</a> -->
                @endcan
                
            </div>
            @can ('update', $user->profile) <!--true or false for authorize that link. /profile/1 for hide "edit profile" to the unlogged users, and other users -->
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a> 
            @endcan
            <div class = "d-flex">
            <div class = "pr-5"><strong>{{ $postCount }}</strong> posts</div>
            <div class = "pr-5"><strong>{{ $followersCount }}</strong> followers</div>
            <div class = "pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>  
        <div class = "pt-4 font-weight-bold">{{ $user->profile->title }}</div> 
        <div>{{ $user->profile->description }}</div> 
        <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
            <a href="{{ $post->post_link }}">
            @if($post->googleImg == 1)
                <img src="{{ $post->image }}" class = "w-100">
            @else
                 <img src="{{ asset('storage/uploads/'.$post->image) }}" class = "w-100">
            @endif
            </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
