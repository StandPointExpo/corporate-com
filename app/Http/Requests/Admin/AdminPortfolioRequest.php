<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPortfolioRequest extends FormRequest
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
            'description'   => 'nullable|sometimes|string|max:255',
            'client'        => 'nullable|sometimes|string|max:255',
            'active'        => 'nullable|sometimes|boolean',
            'title'         => 'nullable|sometimes|string|max:255',
        ];
    }
}
