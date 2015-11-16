<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $primaryKey = 'Id';

	protected $fillable = ['Name', 'Address', 'PhoneNo', 'Email'];
}
