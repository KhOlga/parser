<?php

namespace App\Http\Controllers;

use App\Imports\ProductCategoryImport;
use App\Models\{File, ProductCategory};

class ProductCategoryController extends Controller
{
	public function import()
	{
		try {
			$file = File::whereDate('created_at', now())->first();
			$array = (new ProductCategoryImport)->toArray(storage_path($file->file_path));

			$productCategory = [];
			if ($array[0]) {
				foreach($array[0] as $key => $item) {
					if ($key !== 0) {
						$productCategory[] = $item[2];
					}
				}
			}

			$productCategory = array_unique($productCategory);
			$oldAmount = ProductCategory::count();

			foreach ($productCategory as $value) {
				if ($value) {
					ProductCategory::create([ 'name' => $value ]);
				}
			}
			$amount = (ProductCategory::count()) - $oldAmount;

			return redirect()->back()->with('success', $amount . ' new product categories was created successfully!');
		} catch (\Exception $exception) {
			return redirect()->back()->with('danger', 'This data has already been stored to database!');
		}
	}
}
