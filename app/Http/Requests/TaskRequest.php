<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'manager_id' => 'nullable|integer',
            'status' => 'nullable|string|max:255',
            'publication' => 'nullable|boolean',

            //TaskAreaParameter
            'area_parameter' => 'required|array',
            'area_parameter.aspect_ratio_a' => 'nullable|string|max:255',
            'area_parameter.aspect_ratio_b' => 'nullable|string|max:255',
            'area_parameter.aspect_ratio_h' => 'nullable|string|max:255',
            'area_parameter.configuration' => 'nullable|string|max:255',
            'area_parameter.area_info' => 'nullable|string|max:1000',
            'area_parameter.file_ids' => 'nullable|array',
            'area_parameter.file_ids.*' => 'nullable|integer|exists:task_files,id',

            //TaskConstructionParameter
            'construction_parameter' => 'required|array',
            'construction_parameter.negotiation_area_notes' => 'nullable|string|max:1000',
            'construction_parameter.suspension_structure' => 'nullable|string|max:255',
            'construction_parameter.double_decker_stand' => 'nullable|string|max:255',
            'construction_parameter.double_decker_notes' => 'nullable|string|max:1000',
            'construction_parameter.utility_room_notes' => 'nullable|string|max:1000',
            'construction_parameter.suspension_notes' => 'nullable|string|max:1000',
            'construction_parameter.additional_info' => 'nullable|string|max:1000',
            'construction_parameter.height_stand' => 'nullable|string|max:255',
            'construction_parameter.utility_room' => 'nullable|string|max:255',
            'construction_parameter.floor_notes' => 'nullable|string|max:1000',
            'construction_parameter.walls_notes' => 'nullable|string|max:1000',
            'construction_parameter.floor' => 'nullable|string|max:255',
            'construction_parameter.walls' => 'nullable|array',
            'construction_parameter.walls.*' => 'nullable|string|max:255',
            'construction_parameter.negotiation_areas' => 'nullable|array',
            'construction_parameter.negotiation_areas.*' => 'nullable|integer|max:50|exists:task_construction_parameter_negotiation_area_values,id',

            //TaskTechnicalParameter
            'technical_parameter' => 'required|array',
            'technical_parameter.reception_desk_notes' => 'nullable|string|max:1000',
            'technical_parameter.storefronts_notes' => 'nullable|string|max:1000',
            'technical_parameter.furnishings_notes' => 'nullable|string|max:1000',
            'technical_parameter.multimedia_notes' => 'nullable|string|max:1000',
            'technical_parameter.furnishings_room' => 'nullable|string|max:255',
            'technical_parameter.additional_info' => 'nullable|string|max:1000',
            'technical_parameter.lighting_notes' => 'nullable|string|max:1000',
            'technical_parameter.reception_desk' => 'nullable|string|max:255',
            'technical_parameter.podium_notes' => 'nullable|string|max:1000',
            'technical_parameter.logo_notes' => 'nullable|string|max:1000',
            'technical_parameter.devices' => 'nullable|string|max:1000',

            'technical_parameter.lightings' => 'nullable|array',
            'technical_parameter.lightings.*' => 'nullable|string|max:255',
            'technical_parameter.storefronts' => 'nullable|array',
            'technical_parameter.storefronts.*' => 'nullable|string|max:255',
            'technical_parameter.multimedia' => 'nullable|array',
            'technical_parameter.multimedia.*' => 'nullable|string|max:255',
            'technical_parameter.furnishings' => 'nullable|array',
            'technical_parameter.furnishings.*' => 'nullable|string|max:255',

            'technical_parameter.logos' => 'nullable|array',
            'technical_parameter.logos.*' => 'nullable|integer|max:50|exists:task_technical_parameter_podium_values,id',
            'technical_parameter.podiums' => 'nullable|array',
            'technical_parameter.podiums.*' => 'nullable|integer|max:50|exists:task_technical_parameter_logo_values,id',
            'technical_parameter.logo_file_ids' => 'nullable|array',
            'technical_parameter.logo_file_ids.*' => 'nullable|integer|exists:task_files,id',
            'technical_parameter.device_file_ids' => 'nullable|array',
            'technical_parameter.device_file_ids.*' => 'nullable|integer|exists:task_files,id',


            //TaskDesignWish
            'design_wishes' => 'required|array',
            'design_wishes.estimated_budget' => 'nullable|string|max:255',
            'design_wishes.design_wishes_notes' => 'nullable|string|max:1000',
            'design_wishes.branding_presentation' => 'nullable|string|max:255',
            'design_wishes.presentation_notes' => 'nullable|string|max:1000',

            'design_wishes.design_file_ids' => 'nullable|array',
            'design_wishes.design_file_ids.*' => 'nullable|integer|exists:task_files,id',
            'design_wishes.brandbook_file_ids' => 'nullable|array',
            'design_wishes.brandbook_file_ids.*' => 'nullable|integer|exists:task_files,id',
            'design_wishes.client_like_file_ids' => 'nullable|array',
            'design_wishes.client_like_file_ids.*' => 'nullable|integer|exists:task_files,id',
            'design_wishes.sketch_file_ids' => 'nullable|array',
            'design_wishes.sketch_file_ids.*' => 'nullable|integer|exists:task_files,id',
            'design_wishes.other_file_ids' => 'nullable|array',
            'design_wishes.other_file_ids.*' => 'nullable|integer|exists:task_files,id',
        ];
    }
}
