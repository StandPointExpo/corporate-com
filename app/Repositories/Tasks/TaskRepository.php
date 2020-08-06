<?php

namespace App\Repositories\Tasks;

use App\Tasks\Task;
use App\Tasks\TaskAreaParameter;
use App\Tasks\TaskConstructionParameter;
use App\Tasks\TaskConstructionParameterNegotiationAreaValue;
use App\Tasks\TaskDesignWish;
use App\Tasks\TaskTechnicalParameter;
use App\Tasks\TaskTechnicalParameterLogoValue;
use App\Tasks\TaskTechnicalParameterPodiumValue;
use Illuminate\Support\Collection;

class TaskRepository
{
    /**
     * @return Task
     */
    public function getInstanceWithRelations() : Task
    {
        $model = new Task;

        return $model->load(['areaParameter.comments', 'constructionParameter.walls', 'constructionParameter.negotiationAreas',
            'constructionParameter.comments', 'technicalParameter.lightings',  'technicalParameter.storefronts',
            'technicalParameter.multimedia', 'technicalParameter.furnishings', 'technicalParameter.logos',
            'technicalParameter.podiums', 'technicalParameter.comments', 'designWish.comments', 'comments'
        ]);
    }

    /**
     * @return Collection
     */
    public function getParameterValues() : Collection
    {
        $constructionParameters   = collect([
            'construction_parameter' => [
                'negotiation_areas'  => TaskConstructionParameterNegotiationAreaValue::select(['id', 'value'])->get()
            ],
        ]);
        $technicalParameters = collect([
            'technical_parameter' => [
                'podiums'    => TaskTechnicalParameterPodiumValue::select(['id', 'value'])->get(),
                'logos'      => TaskTechnicalParameterLogoValue::select(['id', 'value'])->get(),
            ]
        ]);

        return collect()->push($constructionParameters)->push($technicalParameters);
    }

    /**
     * @param Collection $data
     * @return Task
     */
    public function storeTask(Collection $data): Task
    {
        $task = Task::create();

        $this->storeTaskAreaParameter($task, collect($data->get('area_parameter')));
        $this->storeTaskConstructionParameter($task, collect($data->get('construction_parameter')));
        $this->storeTaskTechnicalParameter($task, collect($data->get('technical_parameter')));
        $this->storeTaskDesignWish($task, collect($data->get('design_wishes')));

        return $task;
    }

    /**
     * @param Task $task
     * @param Collection $data
     * @return TaskAreaParameter
     */
    public function storeTaskAreaParameter(Task $task, Collection $data) : TaskAreaParameter
    {
        $areaParameter = $task->areaParameter()->create([
            'aspect_ratio_a'    => $data->get('aspect_ratio_a'),
            'aspect_ratio_b'    => $data->get('aspect_ratio_b'),
            'aspect_ratio_h'    => $data->get('aspect_ratio_h'),
            'configuration'     => $data->get('configuration'),
            'area_info'         => $data->get('area_info')
        ]);

//        if (!empty($files = $data->get('file_ids'))) { //todo files() relation
//            TaskFile::whereIn('id', $files)->update(['publication' => true]);
//        }

        return $areaParameter;
    }

    /**
     * @param Task $task
     * @param Collection $data
     * @return TaskConstructionParameter
     */
    public function storeTaskConstructionParameter(Task $task, Collection $data) : TaskConstructionParameter
    {
        $constructionParameter = $task->constructionParameter()->create([
            'negotiation_area_notes' => $data->get('negotiation_area_notes'),
            'suspension_structure' => $data->get('suspension_structure'),
            'double_decker_stand' => $data->get('double_decker_stand'),
            'double_decker_notes' => $data->get('double_decker_notes'),
            'utility_room_notes' => $data->get('utility_room_notes'),
            'suspension_notes' => $data->get('suspension_notes'),
            'additional_info' => $data->get('additional_info'),
            'height_stand' => $data->get('height_stand'),
            'utility_room' => $data->get('utility_room'),
            'floor_notes' => $data->get('floor_notes'),
            'walls_notes' => $data->get('walls_notes'),
            'floor' => $data->get('floor'),
        ]);
        if (!empty($walls = $data->get('walls'))) {
            foreach ($walls as $wall) {
                $constructionParameter->walls()->create([ 'value' => $wall ]);
            }
        }
        $constructionParameter->negotiationAreas()->sync($data->get('negotiation_areas'));

        return $constructionParameter;
    }

    /**
     * @param Task $task
     * @param Collection $data
     * @return TaskTechnicalParameter
     */
    public function storeTaskTechnicalParameter(Task $task, Collection $data) : TaskTechnicalParameter
    {
        $technicalParameter = $task->technicalParameter()->create([
            'reception_desk_notes' => $data->get('reception_desk_notes'),
            'storefronts_notes' => $data->get('storefronts_notes'),
            'furnishings_notes' => $data->get('furnishings_notes'),
            'multimedia_notes' => $data->get('multimedia_notes'),
            'furnishings_room' => $data->get('furnishings_room'),
            'additional_info' => $data->get('additional_info'),
            'lighting_notes' => $data->get('lighting_notes'),
            'reception_desk' => $data->get('reception_desk'),
            'podium_notes' => $data->get('podium_notes'),
            'logo_notes' => $data->get('logo_notes'),
            'devices' => $data->get('devices'),
        ]);

        foreach (['lighting', 'storefronts', 'multimedia', 'furnishings'] as $taskTechnicalParameterRelation) {
            if (!empty($relationData = $data->get($taskTechnicalParameterRelation))) {
                foreach ($relationData as $values) {
                    $technicalParameter->{$taskTechnicalParameterRelation}()->create(['value' => $values[0]]);
                }
            }
        }

        foreach (['logos', 'podiums'] as $taskTechnicalParameterRelation) {
            $technicalParameter->{$taskTechnicalParameterRelation}()->sync($data->get($taskTechnicalParameterRelation));
        }

//        if (!empty($logoFiles = $data->get('logo_file_ids'))) { //todo logoFiles() relation
//            TaskFile::whereIn('id', $logoFiles)->update(['publication' => true]);
//        }

//        if (!empty($deviceFiles = $data->get('device_file_ids'))) { //todo deviceFiles() relation
//            TaskFile::whereIn('id', $deviceFiles)->update(['publication' => true]);
//        }

        return $technicalParameter;
    }

    /**
     * @param Task $task
     * @param Collection $data
     * @return TaskDesignWish
     */
    public function storeTaskDesignWish(Task $task, Collection $data) : TaskDesignWish
    {
        $designWish = $task->designWish()->create([
            'branding_presentation' => $data->get('branding_presentation'),
            'design_wishes_notes' => $data->get('design_wishes_notes'),
            'presentation_notes' => $data->get('presentation_notes'),
            'estimated_budget' => $data->get('estimated_budget'),
        ]);

//        if (!empty($designFiles = $data->get('design_file_ids'))) { //todo designFiles() relation
//            TaskFile::whereIn('id', $designFiles)->update(['publication' => true]);
//        }

//        if (!empty($brandbookFiles = $data->get('brandbook_file_ids'))) { //todo brandbookFiles() relation
//            TaskFile::whereIn('id', $brandbookFiles)->update(['publication' => true]);
//        }

//        if (!empty($clientLikeFiles = $data->get('client_like_file_ids'))) { //todo clientLikeFiles() relation
//            TaskFile::whereIn('id', $clientLikeFiles)->update(['publication' => true]);
//        }

//        if (!empty($sketchFiles = $data->get('sketch_file_ids'))) { //todo sketchFiles() relation
//            TaskFile::whereIn('id', $sketchFiles)->update(['publication' => true]);
//        }

//        if (!empty($otherFiles = $data->get('other_file_ids'))) { //todo otherFiles() relation
//            TaskFile::whereIn('id', $otherFiles)->update(['publication' => true]);
//        }

        return $designWish;
    }
}
