<?php

namespace App\Http\Controllers;

use App\Imports\SubRubricImport;
use App\Models\{File, SubRubric};

class SubRubricController extends Controller
{
	public function import()
	{
		try {
			$file = File::whereDate('created_at', now())->first();
			$array = (new SubRubricImport)->toArray(storage_path($file->file_path));

			$rubric = [];
			$subRubric = [];
			if ($array[0]) {
				foreach($array[0] as $key => $item) {
					if ($key !== 0) {
						($item[0] !== null) ? ($rubric[] = $item[0]) : ($rubric[] = 'rubric');
						$subRubric[] = $item[1];
					}
				}
			}

			$subRubric = array_unique($subRubric);
			$oldAmount = SubRubric::count();

			foreach ($subRubric as $key => $value) {
				if ($value) {
					SubRubric::create([ 'name' => $value ]);
				}
			}
			$amount = (SubRubric::count()) - $oldAmount;
			return redirect()->back()->with('success', $amount . ' new sub-subrics was created successfully!');
		} catch (\Exception $exception) {
			return redirect()->back()->with('danger', 'This data has already been stored to database!');
		}
	}
}
