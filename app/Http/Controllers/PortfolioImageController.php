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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Portfolio $portfolio) //TODO auth()->user() to admin check
    {
        return view('', compact($portfolio));
    }
}
