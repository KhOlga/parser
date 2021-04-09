<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

/** @mixin Builder*/
class SubRubric extends Model
{
	protected $table = 'sub_rubrics';

	protected $fillable = [
		'rubric_id', 'name'
	];

	public $timestamps = false;

	public function rubrics()
	{
		return $this->belongsToMany(Rubric::class, 'rubric_has_sub_rubrics');
	}

	public function productCategories()
	{
		return $this->belongsToMany(ProductCategory::class, 'sub_rubrics_has_product_categories');
	}
}
