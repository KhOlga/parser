<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

	public function rubric()
	{
		return $this->hasMany(Rubric::class);
	}

	public function subRubric()
	{
		return $this->hasMany(SubRubric::class);
	}
}
