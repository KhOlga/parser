<?php

namespace App\Imports;

use App\Models\Warranty;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class WarrantyImport implements ToModel
{
	use Importable;

	public function model(array $row)
	{
		HeadingRowFormatter::default('none');

		return new Warranty([ 'duration'  => $row[8] ]);
	}
}
