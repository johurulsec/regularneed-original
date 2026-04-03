<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class FileHelper
{
    /**
     * Upload a file to the given folder and return its relative path for asset().
     *
     * @param UploadedFile $file
     * @param string $folder
     * @return string
     */
    public static function upload(UploadedFile $file, string $folder = 'uploads'): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Move file to public folder
        $file->move(public_path($folder), $imageName);

        // Return relative path for asset()
        return $folder . '/' . $imageName;
    }
}
