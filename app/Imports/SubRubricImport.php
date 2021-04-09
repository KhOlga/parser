<?php

namespace App\Imports;

use App\Models\SubRubric;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class SubRubricImport implements ToModel
{
	use Importable;

	public function model(array $row)
	{
		HeadingRowFormatter::default('none');

		return new SubRubric([ 'name'  => $row[1] ]);
	}
}
