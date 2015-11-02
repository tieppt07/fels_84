<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'words';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'description'];

    public function category() 
    {
    	return $this->belongsTo(Category::class);
    }

    public function answers() 
    {
    	return $this->hasMany(Answer::class);
    }

    public function results() 
    {
    	return $this->hasMany(Result::class);
    }
}
