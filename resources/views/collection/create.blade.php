@extends('layouts.app-new')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h2>Add New Post</h2>
                        </div>
                        @if(!empty($data))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Post Title</label>
                                    <input id="caption" type="text" class="form-control title @error('caption') is-invalid @enderror" name="caption" value="{{ $data['title'] }}" autocomplete="caption" autofocus>
                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                    @if(!empty($data['thumbnail']) && $data['thumbnail'] != "NA")
                                    <input type="hidden", class="form-control" id="googleGetImage" name="googleGetImage" value="{{ $data['thumbnail'] }}">
                                    <img src="{{$data['thumbnail'] }}" width="50" height="50">
                                    @else
                                    <input type="hidden", class="form-control" id="googleGetImage" name="googleGetImage" value="/storage/uploads/NA.png">
                                    <img src="/storage/uploads/NA.png" width="50" height="50">
                                    @endif
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Author</label>
                                    <input id="author" type="text" class="form-control" name="author" value="{{ $data['author'] }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Price</label>
                                    <input id="price" type="text" class="form-control" name="price" value="{{ $data['price'] }}">
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                                <input id="caption" type="text" class="form-control title @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row">
                            <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                <input type="file", class="form-control-file" id="image" name="image">
                                @error('image')
                                    <strong>{{ $message }}</strong>
                                @enderror
                        </div>
                        @endif
                        <div class="row pt-4">
                            <button class="btn btn-primary">Add New Post</button>
                        </div>
                    </div>
                </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('collection.post-get')
@endsection
