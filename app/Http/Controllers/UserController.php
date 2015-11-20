<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('users.index', ['users' => $users] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
		var_dump($user->id);
		var_dump(Auth::user()->id);
        if (Auth::user()->id != $user->id)
		{
			$user->delete();
			return Redirect::route('users.index')->with('message', 'User deleted');
		}

		return Redirect::route('users.index')->with('message', 'You cannot delete the user that you are currently logged in as');
    }
}
