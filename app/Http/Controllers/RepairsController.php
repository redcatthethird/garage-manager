<?php

namespace App\Http\Controllers;

use DB;
use App\Repair;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Input;

class RepairsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $repairs = Repair::all();

        return view('repairs.index', ['repairs' => $repairs, 'count' => Repair::count()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repairs.create', [] );
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
            'LicencePlate' => ['required','exists:cars','regex:/\b([A-Z]{3}\s?(\d{3}|\d{2}|d{1})\s?[A-Z])|([A-Z]\s?(\d{3}|\d{2}|\d{1})\s?[A-Z]{3})|(([A-HK-PRSVWY][A-HJ-PR-Y])\s?([0][2-9]|[1-9][0-9])\s?[A-HJ-PR-Z]{3})\b/'],
            'StaffId' => 'required|exists:staff,Id',
            'Ongoing' => 'boolean',
            'Type' => 'required',
            'StartDate' => 'required|date|after:yesterday',
            'EndDate' => 'required|date|after:StartDate',
            'Cost' => 'required|numeric',
            'Paid' => 'boolean',
        ]);

        Repair::create( $input );
        return Redirect::route('repairs.index')->with('message', 'Repair created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //var_dump($repair->client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        return view('repairs.edit', compact('repair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Repair $repair, Request $request)
    {
        $input = array_except(Input::all(), ['_method']);

        /*$this->validate($request, [
            'LicencePlate' => ['required','exists:cars','regex:/\b([A-Z]{3}\s?(\d{3}|\d{2}|d{1})\s?[A-Z])|([A-Z]\s?(\d{3}|\d{2}|\d{1})\s?[A-Z]{3})|(([A-HK-PRSVWY][A-HJ-PR-Y])\s?([0][2-9]|[1-9][0-9])\s?[A-HJ-PR-Z]{3})\b/'],
            'StaffId' => 'required|exists:staff,Id',
            'Ongoing' => 'boolean',
            'Type' => 'required',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after:StartDate',
            'Cost' => 'required|numeric',
            'Paid' => 'boolean',
        ]);*/
        $repair->update( $input );


        //return Redirect::route('repairs.index')->with('message', 'Repair updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair->delete();

        return Redirect::route('repairs.index')->with('message', 'Repair deleted');
    }
}
