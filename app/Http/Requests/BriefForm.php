<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BriefForm extends FormRequest
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

    public function messages()
    {
        return [
            "company_name.required" => "The company name field is required.",
            "company_person.required" => "The company person field is required.",
            "company_number.required" => "The company number field is required.",
        ];
    }

    // public function response(array $errors)
    // {
    //     return $this->redirector->to($this->getRedirectUrl())
    //         ->withInput($this->except($this->dontFlash))
    //         ->withErrors($errors, $this->errorBag);
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "uuid" => "string|uuid",
            "company_name" => 'required|string|max:255',
            "company_person" => 'required|string|max:255',
            "company_number" => 'required|string|max:255',
            "company_email" => 'email|string|nullable|max:255',
            "company_web" => "url|nullable|max:255",
            "event_name" => "string|nullable|max:255",
            "event_location" => "string|nullable|max:255",
            "event_date" => "string|nullable|max:255",
            "stand_area_size" => "string|nullable|max:255",
            "stand_area_hall_no" => "string|nullable|max:255",
            "stand_area_stand_no" => "string|nullable|max:255",
            "stand_area_attach_plan" => "string|nullable|max:255",
            "positions_of_design_info_counter" => "string|nullable|max:255",
            "positions_of_design_meeting_rooms" => "string|nullable|max:255",
            "positions_of_design_meeting_places" => "string|nullable|max:255",
            "positions_of_design_storage_room" => "string|nullable|max:255",
            "positions_of_design_podium" => "string|nullable|max:255",
            "positions_of_design_showcase" => "string|nullable|max:255",
            "positions_of_design_screen" => "string|nullable|max:255",
            "positions_of_design_floor" => "string|nullable|max:255",
            "positions_of_design_suspension_structure" => "string|nullable|max:255",
            "positions_of_design_plants" => "string|nullable|max:255",
            "elements_of_design_company_logo" => "string|nullable|max:255",
            "elements_of_design_corporate_colors" => "string|nullable|max:255",
            "elements_of_design_brand_book" => "string|nullable|max:255",
            "elements_of_design_graphic_files" => "string|nullable|max:255",
            "elements_of_design_colors_preferred" => "string|nullable|max:255",
            "elements_of_design_stand_style" => "string|nullable|max:255",
            "elements_of_design_previous_experience_design" => "string|nullable|max:255",
            "product_list" => "string|nullable|max:255",
            "stand_budget" => "string|nullable|max:255",
            "additional_conditions" => "string|nullable|max:255",
        ];
    }
}
