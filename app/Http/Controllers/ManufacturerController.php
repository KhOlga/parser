<?php

namespace App\Http\Controllers;

use App\Imports\ManufacturerImport;
use App\Models\{File, Manufacturer};
use phpDocumentor\Reflection\Location;

class ManufacturerController extends Controller
{
	public function import()
	{
		try {
			$file = File::whereDate('created_at', now())->first();
			$array = (new ManufacturerImport)->toArray(storage_path($file->file_path));

			$manufacturer = [];
			if ($array[0]) {
				foreach($array[0] as $key => $item) {
					if ($key !== 0) {
						$manufacturer[] = $item[3];
					}
				}
			}

			$manufacturer = array_unique($manufacturer);
			$oldAmount = Manufacturer::count();

			foreach ($manufacturer as $value) {
				if ($value) {
					Manufacturer::create([ 'name' => $value ]);
				}
			}
			$amount = (Manufacturer::count()) - $oldAmount;

			return redirect()->back()->with('success', $amount. ' new manufacturers was imported successfully!');
		} catch (\Exception $exception) {
			return redirect()->back()->with('danger', 'This data has already been stored to database!');
		}
	}
}
