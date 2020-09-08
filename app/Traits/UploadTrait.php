<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait UploadTrait {
    
    private function moveUploadedPhoto($photoName, $photoPath, $photoTmpPath, $disk){
        $photoFullPath = $photoPath . '/' . $photoName;
        $photoFullTmpPath = $photoTmpPath . '/' . $photoName;
        Storage::disk($disk)->move($photoFullTmpPath, $photoFullPath);
        return $photoFullPath;
    }
}