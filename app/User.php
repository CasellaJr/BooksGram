<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){ //for create a new profile
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->username,
            ]);

            //mailtrap.io
            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function posts(){ //plural because a user has many relationships
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class); 
    }
}