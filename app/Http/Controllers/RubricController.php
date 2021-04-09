<?php

namespace App\Http\Controllers;

use App\Imports\RubricImport;
use App\Models\{File, Rubric};

class RubricController extends Controller
{
	public function import()
	{
		try {
			$file = File::whereDate('created_at', now())->first();
			$array = (new RubricImport)->toArray(storage_path($file->file_path));

			$rubric = [];
			if ($array[0]) {
				foreach($array[0] as $key => $item) {
					if ($key !== 0) {
						$rubric[$key] = $item[0];
					}
				}
			}

			$rubric = array_unique($rubric);
			$oldAmount = Rubric::count();

			foreach ($rubric as $value) {
				if ($value) {
					Rubric::create([ 'name' => $value ]);
				}
			}
			$amount = (Rubric::count()) - $oldAmount;

			return redirect()->back()->with('success', $amount . ' new rubrics was created successfully!');
		} catch (\Exception $exception) {
			return redirect()->back()->with('danger', 'This data has already been stored to database!');
		}
	}
}
