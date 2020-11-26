@extends('layouts.app-new')

@section('content')
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$collection->id}}</td>
                <td><a href="{{ $collection->link }}" target="_blank"><img src="{{$collection->image_link}}"></a></td>
                <td>{{$collection->title}}</td>
                <td><button type="button" class="addNewPost" data-title="$collection->title" data-image="$collection->image_link"
                data-baseLink="$collection->link" data-author="$collection->author" data-price="$collection->price">Add Post</button></td>
            </tr>
        </tbody>
    </table>
@include('collection.post-get')
@endsection
