<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Answer;
use App\Word;
use App\Lesson;
use App\Result;
use Config;

class AnswersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = new Answer;
        $answer->word_id = $request->get('word_id');
        $answer->answer = $request->get('answer');
        $answer->is_correct = $request->get('is_correct');
        $answer->save();
        return redirect()->action('WordsController@show', [$answer->word_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::findorFail($id);
        $wordId = $request->get('word_id');
        $answer->answer = $request->get('answer');
        $answer->is_correct = $request->get('is_correct');
        $answer->save();
        return redirect()->action('WordsController@show', [$wordId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Answer::destroy($id);
        $wordId = $request->get('word_id');
        return redirect()->action('WordsController@show', [$wordId]);
    }
}
