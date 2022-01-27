<?php

namespace App\Services;

use App\Models\Photo;
use Image;
use File;

class PhotoService
{
    public function upload($file, $post)
    {
        $filePath = "posts/$post->id";

        $this->createDirectory("$filePath/");

        $image = Image::make($file);
        $imageName = time() . '-' . $file->getClientOriginalName();
        
        return $image->save("$filePath/" . $imageName);
    }

    public function create($data)
    {
        return Photo::create($data);
    }

    private function createDirectory($path)
    {
        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true, true);
        }
    }
}
