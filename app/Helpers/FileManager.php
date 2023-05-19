<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class FileManager
{
    public static function fileUpload($key, $folder)
    {
        // $ext = ['jpg', 'jpeg', 'png', 'svg'];
        $file = 'rental-items/'.Carbon::now()->format('MY') .'/'.rand() . '.' . $key->getClientOriginalExtension();
        $key->move('storage/rental-items/'.$folder, $file);
        return $file;
    }

    public static function fileDelete($folder,$file){
        if (File::exists(public_path('storage/rental-items/'. $folder .'/' . $file))) {
            File::delete(public_path('storage/rental-items/'. $folder . '/' . $file));
        }
    }
}
