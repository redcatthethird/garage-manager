<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'Staff';
	protected $primaryKey = 'Id';
	//protected $guarded = [];
	protected $fillable = ['Name', 'Address', 'PhoneNo', 'Email'];
}
