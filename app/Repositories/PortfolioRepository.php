<?php

namespace App\Repositories;

use App\Portfolio;
use App\PortfolioImage;
use Illuminate\Http\UploadedFile;

class PortfolioRepository
{
    public function all()
    {
        return Portfolio::all();
    }

    public function preview()
    {
        return Portfolio::take(20)->get();
    }

    public function store(array $data)
    {
        return Portfolio::create($data);
    }

    public function update(Portfolio $portfolio, array $data)
    {
        return $portfolio->update($data);
    }

    public function storeImage(Portfolio $portfolio, UploadedFile $file)
    {
        $path = $this->uploadImage($portfolio, $file);
    }

    public function uploadImage(Portfolio $portfolio, UploadedFile $file)
    {
        $storage_path   = sprintf("public/uploads/portfolios/%d", $portfolio->id);
        $filename       = sprintf('%d_%s.%s', optional(request()->user())->id ?: 'N',
            str_random(10), $file->getClientOriginalExtension());

        $path = $file->storeAs($storage_path, $filename);

        return \Storage::url($path);
    }

    public function delete(Portfolio $portfolio)
    {
        return $portfolio->delete();
    }

    /**
     * @param PortfolioImage $image
     * @return bool|null
     * @throws \Exception
     */
    public function deleteImage(PortfolioImage $image)
    {
        return $image->delete();
    }
}
