@extends('layouts.app-new')

@section('content')
<div class="container">
    <div class="col-12 searchBarSet">
        <div class="form-group">
            <input type="text" class="from-control" name="serachQuery" id="serachQuery" placeholder="Search Books">
        </div>
        <ul id="searchResult"></ul>
        <div class="clear"></div>
    </div>
    @foreach($posts as $post)
        <div class="post-content">
            <div class="row">
                <div class="col-12">
                    <header id="user-section">
                        <div class="user-profile-img">
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="/storage/{{ $post->user->profile->image }}" class="w-100 post-img-user">
                            </a>
                        </div>
                        <div class="user-profile-name">
                            <h2>
                                <a href="/profile/{{ $post->user->id }}">{{ $post->caption }}</a>
                            </h2>
                        </div>
                    </header>
                </div>
                <div class="col-12">
                    <a href="/profile/{{ $post->user->id }}">
                    @if($post->googleImg == 1)
                        <img src="{{ $post->image }}" class="w-75 post-img">
                    @elseif($post->image == "NA")
                        <img src="/storage/uploads/NA.png" class="w-75 post-img">
                    @else
                        <img src="{{ $post->image }}" class="w-75 post-img">
                    @endif
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4"></div>
            <div class="post-like">
                <button class="btn btn-secondary ml-4" data-like="{{ $post->id }}">Like<span class="post-like-count">1</span></button>
                <p class="personLike"><img src="/storage/{{ $post->user->profile->image }}" class="post-img-user-like">Liked By {{ $post->user->username }} </p>
            </div>
            <!-- <div class="col-6 offset-3">
                <div>    
                    <p>
                        <span class = "font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class = "text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>{{ $post->caption }}
                    </p>
                </div>    
            </div> -->
        </div>
    @endforeach
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('posts.post-get')
@endsection


