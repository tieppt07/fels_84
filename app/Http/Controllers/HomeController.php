<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Activity;
use App\Lesson;
use Config;

class HomeController extends Controller 
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
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $followeeIds = Auth::user()->activities()->get(['followee_id']);
        $activities = Lesson::whereIn('user_id', $followeeIds)
                            ->orderBy('created_at', 'DESC')
                            ->paginate(config('constant.records_per_page.activities'));
        $activities->load(['category', 'user']);
        return view('home', ['activities' => $activities]);
    }
}
