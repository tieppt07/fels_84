<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Activity;

class ActivitiesController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->follower_id = Auth::user()->id;
        $activity->followee_id = $request->get('followeeId');
        $activity->save();
        $countFollowers = Activity::where('followee_id', $request->get('followeeId'))->count();
        return response()->json(['countFollowers' => $countFollowers]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::where('followee_id', $id)->where('follower_id', Auth::user()->id)->delete();
        $countFollowers = Activity::where('followee_id', $id)->count();
        return response()->json(['countFollowers' => $countFollowers]);
    }
}
