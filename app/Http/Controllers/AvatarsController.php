<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\User;

class AvatarsController extends Controller
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'avatar' => 'required|image',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $user =  User::findOrFail($id);
            if ($user->can('update-avatar')) {
                $fileName = date("Ymdhis") . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path() . '/img/avatars', $fileName);
                $user->avatar = '/img/avatars/' . $fileName;
                $user->save();
                return redirect('users/' . $id);
            } else {
                abort(403, 'Unauthorized action.');
            }
        }
    }
}
