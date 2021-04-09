<?php

namespace App\Imports;

use App\Models\ProductCategory;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ProductCategoryImport implements ToModel
{
	use Importable;

	public function model(array $row)
	{
		HeadingRowFormatter::default('none');

		return new ProductCategory([ 'name'  => $row[2] ]);
	}
}
