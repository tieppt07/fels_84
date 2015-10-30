<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function words() 
    {
    	return $this->hasMany(Word::class);
    }

    public function lessons() 
    {
    	return $this->hasMany(Lesson::class);
    }
}
