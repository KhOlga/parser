<?php

namespace App\Imports;

use App\Models\Rubric;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class RubricImport implements ToModel
{
	use Importable;

	public function model(array $row)
	{
		HeadingRowFormatter::default('none');

		return new Rubric([ 'name'  => $row[0] ]);
	}
}
