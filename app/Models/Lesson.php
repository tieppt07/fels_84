<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'category_id'];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function category() 
    {
    	return $this->belongsTo(Category::class);
    }

    public function results() 
    {
    	return $this->hasMany(Result::class);
    }
}
