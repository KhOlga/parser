<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

/** @mixin Builder*/
class Rubric extends Model
{
    protected $table = 'rubrics';

    protected $fillable = [
    	'name'
	];

    public $timestamps = false;

	public function subRubrics()
	{
		return $this->belongsToMany(SubRubric::class, 'rubric_has_sub_rubrics');
	}
}
