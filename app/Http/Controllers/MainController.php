<?php

namespace App\Http\Controllers;

use App\Http\Traits\Responseable;
use App\Language;
use App\Partner;
use App\Repositories\PageRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;
use App\Contact;

class MainController extends Controller
{
    use Responseable;

    protected $portfolioRepository;
    protected $pageRepository;

    public function __construct(PageRepository $pageRepository, PortfolioRepository $portfolioRepository)
    {
        $this->portfolioRepository  = $portfolioRepository;
        $this->pageRepository       = $pageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolios         = $this->portfolioRepository->allActive();
        $previewPortfolios  = $this->portfolioRepository->preview();
        $frontPortfolios    = $this->portfolioRepository->frontPreview();
        $pageText           = $this->pageRepository->mainPage();
        $partners           = Partner::all();
        $contact           = Contact::first();

        return view('index', compact('pageText', 'frontPortfolios', 'partners', 'contact'));
    }

    /**
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage(string $lang)
    {
        $referer    = redirect()->back()->getTargetUrl();
        $parse_url  = parse_url($referer, PHP_URL_PATH);
        $segments   = explode('/', $parse_url);

        if (in_array($segments[1], Language::LANGUAGES)) {
            unset($segments[1]);
        }

        array_splice($segments, 1, 0, $lang);
        $url = request()->root().implode("/", $segments);

        if(parse_url($referer, PHP_URL_QUERY)){
            $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
        }

        return redirect($url);
    }
}
