<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;
use App\PortfolioImage;
use App\Portfolio;

class AdminPortfolioImageController extends Controller
{
    private $repository;

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Portfolio $portfolio)
    {
        $images = $this->repository->images($portfolio);
        return view('admin.modules.portfolios_images.index', compact('portfolio','images'));
    }

    public function create(Portfolio $portfolio, PortfolioImage $portfolioImage)
    {
        return view('admin.modules.portfolios_images.create', compact('portfolio', 'portfolioImage'));
    }

    /**
     * @param Portfolio $portfolio
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Portfolio $portfolio, Request $request)
    {

    }

    public function storeFiles(Portfolio $portfolio, Request $request)
    {
        foreach ($request->allFiles()['images']  as $file) {
            $this->repository->storeImage($portfolio, $file);
        }

        return redirect()->route('admin.portfolios.images.index', compact('portfolio'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioImage $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Portfolio $portfolio, PortfolioImage $image)
    {
        $this->repository->deleteImage($image);

        return back()->with('success');
    }
}
