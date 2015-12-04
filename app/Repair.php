<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Repair extends Model
{
	protected $primaryKey = 'Id';

	protected $guarded = [];

	protected $dates = ["StartDate", "EndDate"];

	//protected $dateFormat = 'Y-m-d';

	public function staff()
	{
		return $this->belongsTo('App\Staff', 'StaffId', 'Id')->withTrashed();
	}

	public function car()
	{
		return $this->belongsTo('App\Car', 'LicencePlate', 'LicencePlate');
	}

	/*
	public function client()
	{
		return $this->car->owner;
	}*/
}
