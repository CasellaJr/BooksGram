<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)  //we have use App\User, otherwise we have to write \App\User
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function() use ($user){
            return $user->posts->count();
        });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile); //this edit is now protected
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){ //some validation
        $this->authorize('update', $user->profile); //authorized

        $data =request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url', //require the http://
            'image' => '',
        ]);

        if(request('image')){ //if because we can click on 'save profile' without updating any new profile img
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000); //composer require intervention/image. fit 2 parameters(width, height). Per avere tutte le imgs 1000*1000
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        )); //auth() is a protection. Without this, an external user, for example in incognite, can edit the profile

        return redirect("/profile/{$user->id}");
    }
}
