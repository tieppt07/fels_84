<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Word;
use App\Category;
use App\Answer;
use Config;
use Validator;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::paginate(config('constant.records_per_page.words'));
        return view('admin.word.index', ['words' => $words]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('admin.word.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), Word::$rules);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $word = new Word();
            $word->name = $request->get('name');
            $word->description = $request->get('description');
            $word->category_id = $request->get('category');
            $word->save();
            return redirect('admin/words');     
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
        $word = Word::findorFail($id);
        $answers = $word->answers();
        return view('admin.word.word', ['word' => $word, 'answers' => $answers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::findorFail($id);
        $categories = Category::lists('name', 'id');
        return view('admin.word.edit', ['word' => $word, 'categories' => $categories]);
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
        $word = Word::findorFail($id);
        $word->name = $request->get('name');
        $word->description = $request->get('description');
        $word->category_id = $request->get('category');
        $word->save();
        return redirect('admin/words');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::findorFail($id);
        $word->answers()->delete();
        $word->delete();
        return redirect('admin/words');
    }
}
