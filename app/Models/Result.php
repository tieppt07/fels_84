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
    protected $fillable = ['lesson_id', 'word_id', 'answer_id', 'valid'];
    
    public $timestamps = false;

    const IS_VALID = 1;
    const IS_INVALID = 0;

    public function scopeValid($query) 
    {
        return $query->where('valid', '=', self::IS_VALID);
    }

    public function isCorrect() 
    {
        if ($this->valid == 1) {
            echo '<p class="list-group-item list-group-item-success">Right</p>';
        } else {
            echo '<p class="list-group-item list-group-item-danger">Wrong</p>';
        }
    }

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
