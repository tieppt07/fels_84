<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;
use Hash;

class PasswordController extends Controller
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
        $user = User::findOrFail($id);
        $valid = Validator::make($request->all(), [
           'password' => 'required|confirmed|min:6',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            if ($user->can('update-password')) {
                if (Hash::check($request->get('currentPassword'), $user->password)) {
                    $user->password = $request->get('password');
                    $user->save();
                    return redirect('users/' . $id);
                } else {
                    return back()->withErrors(['Wrong current password']);
                }
            } else {
                abort(403, 'Unauthorized action.');
            }
        }
    }
}
