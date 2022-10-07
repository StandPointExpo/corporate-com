<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\PortfolioImage;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    private $repository;

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Portfolio $portfolio
     */
    public function index(Portfolio $portfolio)
    {
        //
    }
}
