<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPageRequest extends FormRequest
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
            'name'          => 'required|string|max:255', //todo ?custom validation to convert to string-string
            'site_title'    => 'required|string|max:255',
            'description'   => 'nullable|sometimes|string|max:255',
            'language_id'   => 'required|integer|exists:languages,id'
        ];
    }
}
