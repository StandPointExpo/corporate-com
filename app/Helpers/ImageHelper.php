<?php

class ImageHelper
{

    const DEFAULT_MAIN_IMAGE        = 'default/img/no-image.jpeg';
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

}
