<?php

namespace App\Observers;

use App\PortfolioImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioImageObserver
{
    public function updating(PortfolioImage $portfolioImage)
    {
        if ($portfolioImage->isDirty('is_main') && $portfolioImage->is_main == 1) {

            $previousMainImages = PortfolioImage::mainImage()->where('portfolio_id', '==', $portfolioImage->portfolio_id)->get();
            if ($previousMainImages->count()) {
               $previousMainImages->each(function ($image) {
                    $image->update(['is_main' => false]);
               });
            }
            if (is_null($portfolioImage->preview_file)) {
                try {
                    $this->createPreviewFromFile($portfolioImage);
                } catch (\Exception $e) { dump( $e); }
            }

        }
    }

    public function deleted(PortfolioImage $portfolioImage)
    {
        //todo
    }

    /**
     * @param PortfolioImage $portfolioImage
     * @return bool
     */
    protected function createPreviewFromFile(PortfolioImage $portfolioImage)
    {
        $path = $this->imageResizeAndSave($portfolioImage->file, 290, 180 , $portfolioImage);

        return $portfolioImage->update(['preview_file' => $path]);
    }

    /**
     * @param $storage_path
     * @param null $width
     * @param null $height
     * @param $portfolioImage
     * @return string
     */
    protected function imageResizeAndSave($storage_path, $width = null, $height = null, $portfolioImage)
    {
        $path       = asset($storage_path);
        $filename   = 'preview_'.basename($path);
        $targetPath = storage_path("app/public/uploads/portfolios/$portfolioImage->portfolio_id/$filename");
        $image  = Image::make($path)->resize($width, $height)->save($targetPath);

        return "/storage/uploads/portfolios/$portfolioImage->portfolio_id/$filename";
    }
}
