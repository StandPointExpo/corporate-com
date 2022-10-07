<?php

namespace App\Helpers;

class ImageHelper
{

    const DEFAULT_MAIN_IMAGE        = '/storage/default/img/no-image.jpeg';
    /**
     * @param $file
     * @return string
     */
    public static function nameFromUrl($file){
        if(empty($file))
            $file = self::DEFAULT_MAIN_IMAGE;
        $arr = explode('/', $file);
        return end($arr);
    }

    public static function filePreviewUrl($file){
        if(empty($file))
            return self::DEFAULT_MAIN_IMAGE;
        $arr = explode('/', $file);
        $name = end($arr);
        $newArr = array_splice($arr, 0, -1);
        array_push($newArr, 'preview', $name);
        return implode('/', $newArr);
    }

}
