<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Traits\Responseable;
use Illuminate\Http\Request;
use App\Partner;

class AdminPartnerController extends Controller
{
    use Responseable;

    /**
     * @param Partner $partner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::all();

        return view('admin.modules.partners.index', compact('partners'));
    }

    /**
     * @param Partner $partner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Partner $partner)
    {
        return view('admin.modules.partners.create', compact('partner'));
    }

    /**
     * @param Partner $partner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Partner $partner)
    {
        return view('admin.modules.partners.edit', compact('partner'));
    }

    /**
     * @param Partner $partner
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Partner $partner, Request $request) //todo partner request
    {
        $partner->create($request->only(['name', 'link']));

        return $this->redirectSuccess('admin.partners.index');
    }

    /**
     * @param Partner $partner
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Partner $partner, Request $request)  //todo partner request
    {
        $partner->update($request->only(['name', 'link']));

        return $this->redirectSuccess('admin.partners.index');
    }

    /**
     * @param Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return $this->redirectSuccess('admin.partners.index');
    }
}
