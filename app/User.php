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
        'name', 'hometeam','codingteam', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function likings()
    {
        return $this->belongsToMany(User::class, 'user_like', 'user_id', 'like_id')->withTimestamps();
    }
    
    public function like($userId)
    {
        // confirm if already liking
        $exist = $this->is_liking($userId);
        // confirming that it is not you
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // do nothing if already liking
            return false;
        } else {
            // like if not liking
            $this->likings()->attach($userId);
            return true;
        }
    }
    
    public function unlike($userId)
    {
        // confirming if already liking
        $exist = $this->is_liking($userId);
        // confirming that it is not you
        $its_me = $this->id == $userId;
    
    
        if ($exist && !$its_me) {
            // stop liking if liking
            $this->likings()->detach($userId);
            return true;
        } else {
            // do nothing if not liking
            return false;
        }
    }
    
    
    public function is_liking($userId) {
        return $this->likings()->where('like_id', $userId)->exists();
    }
}
