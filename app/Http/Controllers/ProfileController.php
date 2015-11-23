<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Activity;
use App\Lesson;
use Auth;
use Config;
use DB;

class ProfileController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $activities = $user->lessons()->paginate(config('constant.records_per_page.activities'));
        $activities->load(['category']);
        return view('front.profile', ['activities' => $activities, 'user' => $user]);
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
        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $user = User::findOrFail($id);
            $user->name = $request->get('name');
            $user->save();
            return redirect('users/' . $id);
        }
    }
}
