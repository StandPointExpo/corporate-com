<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Repositories\PortfolioRepository;

class PortfolioController extends Controller
{
    private $repository;

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($page = 1)
    {
        $portfolios = $this->repository->getActivePaginate($page);
        $contact = Contact::first();
        return view('portfolios', compact('portfolios', 'contact'));
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Portfolio $portfolio)
    {
        $images = $portfolio->images()->get();

        return view('modules.portfolios.show-portfolio', compact('portfolio', 'images'));
    }
}
