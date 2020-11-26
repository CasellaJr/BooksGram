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
        @if(!empty($collection))
            @foreach($collection as $collections)
                <tr>
                    <td>{{@$collections->id}}</td>
                    <td>
                    @if($collections->image_link == "NA")
                    <a href="{{ @$collections->link }}" target="_blank"><img src="/storage/uploads/NA.png" height="100" width="100"></a>
                    <?php $imageLink = '/storage/uploads/NA.png'; 
                          $check = "NA";
                    ?>
                    @else
                        <a href="{{ @$collections->link }}" target="_blank"><img src="{{@$collections->image_link}}" height="100" width="100"></a>
                    <?php $imageLink = $collections->image_link; 
                          $check = "Available";
                    ?>    
                    @endif
                    @if($collections->link == "NA")
                         <?php $baseLink = "NA"; ?>
                    @else
                         <?php $baseLink = $collections->link; ?>
                    @endif
                    <td>{{@$collections->title}}</td>
                    <td><button type="button" class="addNewPost" data-title="{{@$collections->title}}" data-image="{{@$imageLink}}"
                    data-baseLink="{{@$baseLink}}" data-author="{{@$collections->author}}" data-price="{{@$collections->price}}" data-check="{{$check}}">Add Post</button></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('collection.post-get')
@endsection


