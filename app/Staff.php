<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	protected $table = 'Staff';

	//protected $guarded = [];
	protected $fillable = ['Name', 'Address', 'PhoneNo', 'Email'];
}
