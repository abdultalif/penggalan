<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


// Jika Error Tambahkan upload_tmp_dir = C:/laragon/tmp di php.ini
if (!function_exists('upload')) {
    function upload($directory, $file, $filename = "")
    {
        $extensi  = $file->getClientOriginalExtension();
        $filename = "{$filename}_" . date('Ymdhis') . ".{$extensi}";
        Storage::disk('public')->putFileAs("/$directory", $file, $filename);

        return "/$directory/$filename";
    }
}


if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        }
    }
}
