<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadHandler;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use App\Models\Item;
use Carbon\Carbon;


class ImageUpload extends Controller
{

    public function index()
    {
        return view("uploads");
    }

    public function store(ImageUploadHandler $request)
    {
        if ($request->hasFile('images'))
        {
            $images = $request->file('images');

            if (count($images) > 5)
            {
                return response()->json(['error' => 'You can upload a maximum of 5 images.'], 422);
            }

            foreach ($images as $image)
            {
                $manager = new ImageManager(new Driver());
                $originalName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $fileName = pathinfo(strtolower($originalName), PATHINFO_FILENAME);
                $storedFileName = $fileName . '_' . Str::uuid() . '.' . $extension;
                $image->move('images/', $storedFileName); // Save original image
                $lowQualityImage = $manager->read(public_path("images/" . $storedFileName));
                $lowQualityImage = $lowQualityImage->resize(310,250);
                $lowQualityImage->toJpeg(70)->save('images/low_quality/' . $storedFileName);
                $createdTime = Carbon::now('Europe/Moscow')->shiftTimezone('UTC');
                $createdDate = date('Y-m-d');

                Item::firstOrCreate
                ([
                    'name' => $storedFileName,
                    'date_created' => $createdDate,
                    'time_created' => $createdTime
                ]);
            }

            return redirect('/');
        }
    }
}
