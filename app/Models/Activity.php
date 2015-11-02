<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['follower_id', 'followed_id'];

    public function userFollower() 
    {
    	return $this->belongsTo(User::class, 'follower_id');
    }

    public function userFollowed() 
    {
    	return $this->belongsTo(User::class, 'followed_id');
    }
}
