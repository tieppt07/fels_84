<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Category;
use App\Lesson;
use Word;
use Validator;
use Config;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(config('constant.records_per_page.categories'));
        $categories->load(['words']);
        return view('front.categories', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $category->load(['words']);
        return view('front.category', ['category' => $category]);
    }
}
