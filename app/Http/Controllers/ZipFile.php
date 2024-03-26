<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use ZipArchive;
use File;

class ZipFile extends Controller
{
    public function zipImages()
    {
        $zip = new ZipArchive();
        $zipFileName = 'imagesZip.zip';

        if($zip->open(storage_path($zipFileName), ZipArchive::CREATE) == true)
        {
            $files = File::files(\public_path('images/'));

            if(count($files) > 0)
            {
                foreach($files as $key => $value)
                {
                    $baseName = basename($value);
                    $zip->addFile($value, $baseName);
                }

                $zip->close();
                return response()->download(storage_path($zipFileName));
            }
        }
    }
}
