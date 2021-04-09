<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

/** @mixin Builder*/
class Warranty extends Model
{
	protected $table = 'warranties';

	protected $fillable = [
		'duration'
	];

	public $timestamps = false;

	public function product()
	{
		return $this->hasMany(Product::class);
	}
}
