<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use App\PortfolioImage;
use App\Portfolio;
use Illuminate\Support\Str;

class PortfolioRepository
{
    /**
     * @return Portfolio[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Portfolio::all();
    }

    public function allActive()
    {
        return Portfolio::active()->inRandomOrder()->get();
    }
    /**
     * @return mixed
     */
    public function preview()
    {
        return Portfolio::active()->inRandomOrder()->take(Portfolio::DEFAULT_PORTFOLIOS_NUMBER)->get();
    }

    /**
     * @param Portfolio $portfolio
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function images(Portfolio $portfolio)
    {
        return $portfolio->images()->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return Portfolio::create($data);
    }

    /**
     * @param Portfolio $portfolio
     * @param UploadedFile $file
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeImage(Portfolio $portfolio, UploadedFile $file)
    {
        $path = $this->uploadImage($portfolio, $file);

        return $portfolio->images()->create(['file' => $path]);
    }

    /**
     * @param Portfolio $portfolio
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadImage(Portfolio $portfolio, UploadedFile $file)
    {
        $storage_path   = sprintf("public/uploads/portfolios/%d", $portfolio->id);
        $filename       = sprintf('%d_%s.%s', optional(request()->user())->id ?: 'N',
            Str::random(10), $file->getClientOriginalExtension());

        $path = $file->storeAs($storage_path, $filename);

        return \Storage::url($path);
    }

    /**
     * @param Portfolio $portfolio
     * @param array $data
     * @return bool
     */
    public function update(Portfolio $portfolio, array $data)
    {
        return $portfolio->update($data);
    }

    /**
     * @param PortfolioImage $image
     * @param array $data
     * @return bool
     */
    public function updateImageInfo(PortfolioImage $image, array $data)
    {
        return $image->update($data);
    }

    /**
     * @param Portfolio $portfolio
     * @return bool|null
     * @throws \Exception
     */
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
