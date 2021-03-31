<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function warranty()
	{
		return $this->belongsTo(Warranty::class);
	}

	public function manufacturer()
	{
		return $this->belongsTo(Manufacturer::class);
	}

	public function rubric()
	{
		return $this->belongsTo(Rubric::class);
	}

	public function subRubric()
	{
		return $this->belongsTo(SubRubric::class);
	}

	public function productCategory()
	{
		return $this->belongsTo(ProductCategory::class);
	}
}
