<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    protected $table = 'rubrics';

    protected $fillable = [
    	'name'
	];

    public $timestamps = false;

	public function subRubric()
	{
		return $this->hasMany(SubRubric::class);
	}
}
