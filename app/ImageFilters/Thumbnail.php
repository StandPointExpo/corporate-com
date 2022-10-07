<?php

namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Thumbnail implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(100, 100);
    }
}
