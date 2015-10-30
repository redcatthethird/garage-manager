<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Http\Controllers\Controller;

class Greeting extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function greet()
    {
        $me = DB::select('select Name from Staff');
        return view('greeting', ['name' => $me[0]->Name]);
    }
}