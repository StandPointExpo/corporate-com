<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminPortfolioRequest;
use App\Http\Traits\Responseable;
use App\Repositories\PortfolioRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Portfolio;

class AdminPortfolioController extends Controller
{
    use Responseable;

    private $repository;

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolio = $this->repository->all(true);
        return view('admin.modules.portfolios.index', compact('portfolio'));
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Portfolio $portfolio)
    {
        return view('admin.modules.portfolios.create', compact('portfolio'));
    }

    /**
     * @param AdminPortfolioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminPortfolioRequest $request)
    {
        $portfolio = $this->repository->store($request->only([
            'description',
            'client',
            'active',
            'title',
        ]));
        return $this->redirectSuccess('admin.portfolios.index');
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.modules.portfolios.edit', compact('portfolio'));
    }

    /**
     * @param AdminPortfolioRequest $request
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminPortfolioRequest $request, Portfolio $portfolio)
    {
        $this->repository->update($portfolio, $request->only($request->only([
            'title', 'description', 'active', 'client', 'is_front'
        ])));
        return $this->redirectSuccess('admin.portfolios.index');
    }

    /**
     * @param Portfolio $portfolio
     * @param Request $request
     * @return array
     */
    public function changeStatus(Portfolio $portfolio, Request $request)
    {
        $this->repository->changeStatus($portfolio, $request->get('status'));

        return ['success' => true, 'status' => $portfolio->active];
    }

    /**
     * @param Portfolio $portfolio
     * @param Request $request
     * @return array
     */
    public function changeFront(Portfolio $portfolio, Request $request)
    {
        $this->repository->changeFront($portfolio, $request->get('is_front'));

        return ['success' => true, 'is_front' => $portfolio->is_front];
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->repository->delete($portfolio);
        return $this->redirectSuccess('admin.portfolios.index');
    }
}
