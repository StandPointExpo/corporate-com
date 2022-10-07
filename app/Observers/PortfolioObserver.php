<?php

namespace App\Observers;

use App\Portfolio;


class PortfolioObserver
{
    /**
     * @param Portfolio $portfolio
     */
    public function deleting(Portfolio $portfolio)
    {
        \Storage::deleteDirectory("public/uploads/portfolios/$portfolio->id");
    }
}
