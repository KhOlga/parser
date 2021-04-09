<?php

namespace App\Http\Controllers;

use App\Imports\WarrantyImport;
use App\Models\{File, Warranty};

class WarrantyController extends Controller
{
	public function import()
	{
		try {
			$file = File::whereDate('created_at', now())->first();
			$array = (new WarrantyImport)->toArray(storage_path($file->file_path));

			$warranty = [];
			if ($array[0]) {
				foreach($array[0] as $key => $item) {
					if ($key !== 0) {
						$warranty[] = $item[8];
					}
				}
			}

			$warranty = array_unique($warranty);
			$oldAmount = Warranty::count();

			foreach ($warranty as $value) {
				if ($value) {
					Warranty::create([ 'duration' => $value ]);
				}
			}
			$amount = (Warranty::count()) - $oldAmount;

			return redirect()->back()->with('success', $amount . ' new warranties was created successfully!');
		} catch (\Exception $exception) {
			return redirect()->back()->with('danger', 'This data has already been stored to database!');
		}
	}
}
