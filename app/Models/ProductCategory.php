<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

/** @mixin Builder*/
class ProductCategory extends Model
{
	protected $table = 'product_categories';

	protected $fillable = [
		'rubric_id', 'sub_rubric_id', 'name'
	];

	public $timestamps = false;

	public function product()
	{
		return $this->hasMany(Product::class);
	}

	public function subRubric()
	{
		return $this->belongsToMany(SubRubric::class, 'sub_rubrics_has_product_categories');
	}
}
