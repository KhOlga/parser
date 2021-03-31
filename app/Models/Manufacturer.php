<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
	protected $table = 'manufacturers';

	protected $fillable = [
		'name'
	];

	public $timestamps = false;

	public function product()
	{
		return $this->hasMany(Product::class);
	}
}
