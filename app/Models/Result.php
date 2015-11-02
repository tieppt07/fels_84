<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lesson_id', 'word_id', 'answer_id'];

    public function lesson() 
    {
    	return $this->belongsTo(Lesson::class);
    }

    public function word() 
    {
    	return $this->belongsTo(Word::class);
    }

    public function answer() 
    {
    	return $this->belongsTo(Answer::class);
    }
}
