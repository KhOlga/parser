<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

/** @mixin Builder*/
class File extends Model
{
	protected $fillable = [
		'name',
		'extention',
		'file_path'
	];
}
