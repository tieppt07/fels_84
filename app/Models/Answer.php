<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['word_id', 'answer', 'is_correct'];

    public function word() 
    {
    	return $this->belongsTo(Word::class);
    }

    public function results() 
    {
    	return $this->hasMany(Result::class);
    }
}
