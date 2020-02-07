<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests\Admin\AdminArticleRequest;
use App\Http\Requests\Admin\AdminPageRequest;
use App\Http\Traits\Responseable;
use App\Page;
use App\Repositories\PageRepository;
use Illuminate\Routing\Controller;

class AdminPageController extends Controller
{
    use Responseable;

    protected $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = $this->repository->all();

        return view('admin.modules.pages.index', compact('pages'));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articles(Page $page)
    {
        $articles = $this->repository->allArticles($page);
        return view('admin.modules.pages_articles.index', compact('page', 'articles'));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Page $page)
    {
        return view('admin.modules.pages.create', compact('page'));
    }

    /**
     * @param Page $page
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createArticle(Page $page, Article $article)
    {
        return view('admin.modules.pages_articles.create', compact('page', 'article'));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.modules.pages.edit', compact('page'));
    }

    /**
     * @param Page $page
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @return
     */
    public function editArticle(Page $page, Article $article)
    {
        return view('admin.modules.pages_articles.edit', compact('page', 'article'));
    }

    /**
     * @param Page $page
     * @param AdminPageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Page $page, AdminPageRequest $request)
    {
        $this->repository->store($request->only(['name', 'site_title', 'description', 'language_id']));
        return $this->redirectSuccess('admin.pages.index');
    }

    /**
     * @param Page $page
     * @param Article $article
     * @param AdminArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeArticle(Page $page, Article $article, AdminArticleRequest $request)
    {
        $this->repository->storeArticle($page, $request->only(['name', 'text']));
        return $this->redirectSuccess('admin.pages_articles.index', compact('page'));
    }

    /**
     * @param Page $page
     * @param AdminPageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, AdminPageRequest $request)
    {
        $this->repository->update($page, $request->only(['name', 'site_title', 'description', 'language_id']));
        return $this->redirectSuccess('admin.pages.index');
    }

    /**
     * @param Page $page
     * @param Article $article
     * @param AdminArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateArticle(Page $page, Article $article, AdminArticleRequest $request)
    {
        $this->repository->updateArticle($article, $request->only(['name', 'text']));
        return $this->redirectSuccess('admin.pages_articles.index', compact('page'));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $this->repository->delete($page);
        return $this->redirectSuccess('admin.pages.index');
    }

    /**
     * @param Page $page
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteArticle(Page $page, Article $article)
    {
        $this->repository->deleteArticle($article);
        return $this->redirectSuccess('admin.pages_articles.index', compact('page'));
    }
}
