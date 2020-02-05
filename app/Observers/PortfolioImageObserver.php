<?php

namespace App\Observers;

use App\PortfolioImage;

class PortfolioImageObserver
{
    public function updating(PortfolioImage $portfolioImage)
    {
        if ($portfolioImage->isDirty('is_main') && $portfolioImage->is_main == 1) {

            $previousMainImages = PortfolioImage::mainImage()->get();
            if ($previousMainImages->count()) {
               $previousMainImages->each(function ($image) {
                    $image->update(['is_main' => false]);
               });
            }
        }
    }

    /**
     * Handle the portfolio image "deleted" event.
     *
     * @param  \App\PortfolioImage  $portfolioImage
     * @return void
     */
    public function deleted(PortfolioImage $portfolioImage)
    {
        //
    }
}
