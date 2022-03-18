<?php

namespace App\Traits;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;


trait StorageImageTrait
{
    public function storageTraitUploat($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalName();

            $filePath = $request->file($fieldName)->storeAs('public/' . $foderName , $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    
}
