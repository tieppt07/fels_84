<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Lesson;
use App\Category;
use App\Word;
use App\Answer;
use App\Result;

class LessonsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::where('user_id', Auth::user()->id)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        $lessons->load(['category']);
        return view('front.lesson.index', ['lessons' => $lessons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryId = $request->get('category_id');
        $category = Category::findOrFail($categoryId);
        if ($category->exists()) {
            $lesson = new Lesson();
            $lesson->user_id = Auth::user()->id;
            $lesson->category_id = $categoryId;
            $lesson->save();
            $words = $category->words()->get()->random(20);
            foreach ($words as $word) {
                $results[] = [
                    'lesson_id' => $lesson->id,
                    'word_id' => $word->id,
                    'answer_id' => null,
                ];
            }
            Result::insert($results);
            return redirect('lessons/' . $lesson->id . '/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $results = $lesson->results()->get();
        $results->load(['word.answers']);
        return view('front.lesson.lesson', ['results' => $results, 'lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $results = $lesson->results()->get();
        $results->load(['word.answers']);
        return view('front.lesson.edit', ['results' => $results, 'lesson' => $lesson]);
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
        foreach ($request->answer as $resultId => $answerId) {
            $result = Result::findOrFail($resultId);
            $result->answer_id = $answerId;
            $answer = Answer::findOrFail($answerId);
            if ($answer->is_correct == config('constant.answer.right')) {
                $result->valid = Result::IS_VALID;
            } else {
                $result->valid = Result::IS_INVALID;
            }
            $result->save();
        }
        return redirect()->action('LessonsController@show', [$id]);
    }
}
