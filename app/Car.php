<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	protected $primaryKey = 'LicencePlate';

	protected $fillable = ['LicencePlate', 'ClientId', 'Model'];

	public function owner()
	{
		return $this->belongsTo('App\Client', 'ClientId', 'Id');
	}
	public function repairs()
	{
		return $this->hasMany('App\Repair', 'LicencePlate', 'LicencePlate');
	}
}
