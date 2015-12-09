<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        $key = $request->get('key');
        $users = User::where('name', 'like', '%' . $key . '%')
                     ->orWhere('email', 'like', '%' . $key . '%')
                     ->orderBy('name')
                     ->get();
        return view('front.search', ['users' => $users]);
    }
}
