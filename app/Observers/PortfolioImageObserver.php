<?php

namespace App\Observers;

use App\PortfolioImage;
use Intervention\Image\Facades\Image;

class PortfolioImageObserver
{
    public function updating(PortfolioImage $portfolioImage)
    {
        if ($portfolioImage->isDirty('is_main') && $portfolioImage->is_main) {

            $previousMainImages = PortfolioImage::where('portfolio_id', '=', $portfolioImage->portfolio_id)
                ->mainImage()
                ->get()
                ->each(function ($image) {
                try {
                    if(file_exists($filePath = $this->getStoragePathForDeletingImage($image, $image->preview_file))) unlink($filePath);
                } catch(\Exception $e) { dump($e); }

                $image->update(['is_main' => false, 'preview_file' => null]);
            });

            if (is_null($portfolioImage->preview_file)) {
                try {
                    $this->createPreviewFromFile($portfolioImage);
                } catch (\Exception $e) { dump( $e); }
            }

        }
    }

    public function deleting(PortfolioImage $portfolioImage)
    {
        try {
            $filePath = $this->getStoragePathForDeletingImage($portfolioImage, $portfolioImage->file);
            unlink($filePath);
            if (!is_null($portfolioImage->preview_file))
            {
                unlink($this->getStoragePathForDeletingImage($portfolioImage, $portfolioImage->preview_file));
            }
        } catch (\Exception $e) { dump( $e); }

    }

    protected function getStoragePathForDeletingImage(PortfolioImage $portfolioImage, $filepath)
    {
        return storage_path(implode('/', ['app', 'public', 'uploads', 'portfolios', $portfolioImage->portfolio_id, basename($filepath)]));
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
     * @param string|null $width
     * @param string|null $height
     * @param $portfolioImage
     * @return string
     */
    protected function imageResizeAndSave($storage_path, string $width=null, string $height=null, $portfolioImage)
    {
        $path       = asset($storage_path);
        $filename   = sprintf('preview_%d_%s', time(), basename($path));
        $targetPath = sprintf("public/uploads/portfolios/%d/%s", $portfolioImage->portfolio_id, $filename);
        $image  = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode(pathinfo($filename, PATHINFO_EXTENSION));

        \Storage::put($filename, $image);
        \Storage::move($filename, $targetPath);

        $image->destroy();

        return \Storage::url($targetPath);
    }
}
