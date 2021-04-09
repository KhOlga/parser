<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class ProductImport implements WithMappedCells, ToModel
{
	public function mapping(): array
	{
		return [
			'name'  => 'E1',
			'description' => 'G1',
			'model_code' => 'F1',
			'price' => 'H1',
			'available' => 'J1'
		];
	}

	public function model(array $row)
	{
		return new Product([
			'name'  => $row['name'],
			'description' => $row['description'],
			'model_code' => $row['model_code'],
			'price' => $row['price'],
			'available' => $row['available']
		]);
	}
}
