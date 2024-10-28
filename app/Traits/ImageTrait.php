<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;


trait ImageTrait
{
    // ?todo save image 
    public function saveimage($image, $folder)
    {

        $image_name = time() . '.' . $image->extension();
        $image_base_name = pathinfo($image_name, PATHINFO_FILENAME);
        $images = $image->move(public_path($folder), $image_name);
        $path = "/api/imageusers/$image_base_name";

        return $path;
    }

    // ?todo return image users I Want it
    public function returnimages($value, $folder)
    {
        return response()->download(public_path($folder . $value));
    }

    // ?todo return image users I Want it
    public function returnimageuser($value)
    {
        return response()->download(storage_path('app/public/images/users/' . $value));
    }


    // ?todo add new media 
    protected function Addmedia($info, $media)
    {
        $info->media()->create([
            'media' => $media
        ]);
    }



    // ?todo save pdf
    public function savePdf($file, $folder)
    {
        $folderPath = public_path($folder);

        //? Ensure the folder exists
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        try {
            $file->move($folderPath, $fileName);
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
        return $fileName;
    }




}





