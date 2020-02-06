<?php


namespace App\Repositories;

use App\Language;
use App\Article;
use App\Page;


class PageRepository
{
    public function all()
    {
        return Page::all();
    }

    public function allArticles(Page $page)
    {
        return $page->articles()->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return Page::create($data);
    }

    /**
     * @param Page $page
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeArticle(Page $page, array $data)
    {
        return $page->articles()->create($data);
    }

    /**
     * @param Page $page
     * @param array $data
     * @return bool
     */
    public function update(Page $page, array  $data)
    {
        return $page->update($data);
    }

    /**
     * @param Article $article
     * @param array $data
     * @return int
     */
    public function updateArticle(Article $article, array $data)
    {
        return $article->update($data);
    }

    /**
     * @param Page $page
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Page $page)
    {
        return $page->delete();
    }

    /**
     * @param Article $article
     * @return bool|null
     * @throws \Exception
     */
    public function deleteArticle(Article $article)
    {
        return $article->delete();
    }
}
