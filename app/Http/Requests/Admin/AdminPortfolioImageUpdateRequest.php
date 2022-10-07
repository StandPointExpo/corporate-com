<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPortfolioImageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'nullable|sometimes|string|max:255',
            'description'   => 'nullable|sometimes|string|max:420',
            'active'        => 'nullable|sometimes|boolean',
            'is_main'       => 'nullable|sometimes|boolean'
        ];
    }
}
