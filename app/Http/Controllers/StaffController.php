<?php

namespace App\Http\Controllers;

use DB;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event;
use Input;
use Redirect;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staff = Staff::all();
        //$staff = DB::select("SELECT * FROM Staff;");

        return view('staff.index', ['staff' => $staff, 'count' => Staff::count()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create', [] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $this->validate($request, [
            'Name' => 'required|string',
            'PhoneNo' => 'digits:11',
            'Email' => 'email'
        ]);

        Staff::create( $input );
        return Redirect::route('staff.index')->with('message', 'Staff created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Staff $staff, Request $request)
    {
        $input = array_except(Input::all(), ['_method']);
        $this->validate($request, [
            'Name' => 'required|string',
            'PhoneNo' => 'digits:11',
            'Email' => 'email'
        ]);

        $staff->update( $input );
        return Redirect::route('staff.index')->with('message', 'Staff updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return Redirect::route('staff.index')->with('message', 'Staff deleted');
    }
}
