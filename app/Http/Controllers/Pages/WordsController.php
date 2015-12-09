<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Word;
use App\Category;
use App\User;
use App\Result;

class WordsController extends Controller
{
    /**lists
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
        $categories = Category::lists('name', 'id');
        $words = Word::orderBy('name')->paginate(config('constant.records_per_page.words'));
        return view('front.words', ['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $filter = $request->get('filter');
        $categoryId = $request->get('category');
        $lessonsID = Auth::user()->lessons()
                                 ->where('category_id', $categoryId)
                                 ->lists('lessons.id');
        $learnedWordsID = Result::where('valid', Result::IS_VALID)
                                ->whereIn('lesson_id', $lessonsID)
                                ->lists('word_id');
        if ($filter == 'unlearned') {
            $words = Word::where('category_id', $categoryId)
                         ->whereNotIn('id', $learnedWordsID)
                         ->orderBy('name')
                         ->get();
        } elseif ($filter == 'learned') {
            $words = Word::whereIn('id', $learnedWordsID)
                         ->orderBy('name')
                         ->get();
        } else {
            $words = Word::orderBy('name')->where('category_id', $categoryId)->get();
        }
        return response()->json(['words' => $words]);
    }
}
