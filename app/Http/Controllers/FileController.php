<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadFormRequest;
use App\Models\File;

class FileController extends Controller
{
	public function upload(FileUploadFormRequest $request)
	{
		$data = $request->validated();
		$file = $data['file'];

		if($file) {
			$extention = $file->guessClientExtension();
			$name = time() . ".$extention";

			File::create([
				'name' => $name,
				'extention' => $extention,
				'file_path' => $file->storeAs('uploads', $name, 'public')
			]);

			return redirect()->back()
				->with('success','File has been uploaded.')
				->with('file', "$name.$extention");
		}
	}
}
