<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpLoadImage($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
            $result = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $result;
        } else {
            return null;
        }
    }

    public function storageTraitUpLoadMultiImage($fieldName, $folderName)
    {
        $fileNameOrigin = $fieldName->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $fieldName->getClientOriginalExtension();
        $filePath = $fieldName->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
        $result = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $result;
    }
}
