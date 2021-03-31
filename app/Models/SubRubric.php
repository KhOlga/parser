<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubRubric extends Model
{
	protected $table = 'rubrics';

	protected $fillable = [
		'rubric_id', 'name'
	];

	public $timestamps = false;

	public function rubric()
	{
		return $this->belongsTo(Rubric::class);
	}
}
