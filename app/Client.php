<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Client extends Model
{
	protected $primaryKey = 'Id';

	protected $fillable = ['Name', 'Address', 'PhoneNo', 'Email'];

	public function cars()
	{
		return $this->hasMany('App\Car', 'ClientId', 'Id');
	}

	/*public function repairs()
	{
		for (Car $car in $this->cars)
			$repairs[] = $car->repairs->merge();
		return $repairs;
	}*/
}
