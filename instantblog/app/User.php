<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'social_id', 'is_admin', 'username', 'avatar', 'email', 'password' , 'website' , 'facebook' ,
        'twitter', 'instagram', 'linkedin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Post belongs to user
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //posts that a specific user has liked
    public function likedPosts()
    {
        return $this->morphedByMany('App\Post', 'likeable')->whereDeletedAt(null);
    }

    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
