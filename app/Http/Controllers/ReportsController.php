<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repair;

class ReportsController extends Controller
{
    public function dailyRepairs () {
		return view('report', ['title' => "Today's repairs", 'repairs' => Repair::where('EndDate', \Carbon\Carbon::today()->toDateString())->get()]);
	}

	public function unpaidRepairs() {
		return view('report', ['title' => "Unpaid repairs", 'repairs' => Repair::where('Paid', 0)->get()]);
	}

	public function ongoingRepairs() {
		return view('report', ['title' => "Ongoing repairs", 'repairs' => Repair::where('Ongoing', 1)->get()]);
	}

}
