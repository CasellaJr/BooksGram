<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\collection;
use Auth;

class CollectionController extends Controller
{
    public function index()
    {
    	$collection = collection::where('user_id',Auth::user()->id)->get();
    	return view('collection.index',compact('collection'));
    }

    public function store(Request $request)
    {
    	$newThumbnail = str_replace('$','&',$request->thumbnail);
        $newbuyLink = str_replace('$','&',$request->buyLink);
    	$allcollection = new collection;
    	$allcollection->user_id = Auth::user()->id;
    	$allcollection->title = $request->title;
    	$allcollection->link =$newbuyLink;
    	$allcollection->price =$request->price;
    	$allcollection->image_link = $newThumbnail;
    	$allcollection->author =$request->author;
    	$allcollection->save();

    	$collection = collection::where('user_id',Auth::user()->id)->get();
    	return view('collection.index',compact('collection'));
    }
}
