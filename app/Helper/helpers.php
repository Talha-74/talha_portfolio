<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

function uploadFile($inputName, $model = null) {
    // If no new file is uploaded, return the existing file path
    $filePath = $model ? $model->{$inputName} : null;
    
    try {
        if (request()->hasFile($inputName)) {
            if ($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->image));
            }

            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);
            $filePath = '/uploads/' . $fileName;

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}
