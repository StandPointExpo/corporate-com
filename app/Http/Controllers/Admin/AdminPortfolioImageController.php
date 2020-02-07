<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminPortfolioImageRequest;
use App\Http\Requests\Admin\AdminPortfolioImageUpdateRequest;
use App\Http\Traits\Responseable;
use Illuminate\Routing\Controller;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;
use App\PortfolioImage;
use App\Portfolio;

class AdminPortfolioImageController extends Controller
{
    use Responseable;

    private $repository;

    /**
     * AdminPortfolioImageController constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Portfolio $portfolio)
    {
        $images = $this->repository->images($portfolio);
        return view('admin.modules.portfolios_images.index', compact('portfolio','images'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioImage $portfolioImage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Portfolio $portfolio, PortfolioImage $portfolioImage)
    {
        return view('admin.modules.portfolios_images.create', compact('portfolio', 'portfolioImage'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioImage $image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Portfolio $portfolio, PortfolioImage $image)
    {
        return view('admin.modules.portfolios_images.edit', compact('portfolio', 'image'));
    }

    /**
     * @param Portfolio $portfolio
     * @param AdminPortfolioImageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeFiles(Portfolio $portfolio, AdminPortfolioImageRequest $request)
    {
        foreach ($request->allFiles()['images']  as $file) {
            $this->repository->storeImage($portfolio, $file);
        }
        return $this->redirectSuccess('admin.portfolios.images.index', compact('portfolio'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioImage $image
     * @param AdminPortfolioImageUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Portfolio $portfolio, PortfolioImage $image, AdminPortfolioImageUpdateRequest $request)
    {
        $this->repository->updateImageInfo($image, $request->only([
            'title', 'description', 'active', 'is_main'
        ]));
        return $this->redirectSuccess('admin.portfolios.images.index', compact('portfolio'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioImage $image
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Portfolio $portfolio, PortfolioImage $image)
    {
        $this->repository->deleteImage($image);
        return $this->backSuccess();
    }
}
