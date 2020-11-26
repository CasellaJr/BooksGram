<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
use App\post_like;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);



        
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request){
        //dd($request->title);
        $newThumbnail = str_replace('$','&',$request->thumbnail);
        $newbuyLink = str_replace('$','&',$request->buyLink);
        $data = ['title'=>$request->title,'author'=>$request->author,'price'=>$request->price,'buyLink'=>$newbuyLink,'thumbnail'=>$newThumbnail];
        return view('posts.create',compact('data'));
    }

    public function store(Request $request){
        $input = $request->all();
        if(!empty($request->googleGetImage)){
            auth()->user()->posts()->create([
            'caption' => $request->caption,
            'image' => $request->googleGetImage,
            'author'=>$request->author,
            'price'=>$request->price,
            'googleImg'=>1,
            'post_link'=>$request->buyLink,
        ]);
        }else{
            if($input['check'] != "NA"){
                $googleImg = 1;
            }else{
                $googleImg = 0;
            }
            auth()->user()->posts()->create([
            'caption' => $input['title'],
            'image' => $input['image'],
            'author'=>$input['author'],
            'price'=>$input['price'],
            'post_link'=>$input['baseLink'],
            'googleImg'=>$googleImg,
        ]);
        return response()->json('success');
    }

        return redirect('/profile/' . auth()->user()->id);
    }
    
    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
