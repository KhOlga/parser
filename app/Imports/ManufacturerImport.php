<?php

namespace App\Imports;

use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ManufacturerImport implements ToModel
{
	use Importable;

	public function model(array $row)
	{
		HeadingRowFormatter::default('none');

		return new Manufacturer([ 'name'  => $row[3] ]);
	}
}
