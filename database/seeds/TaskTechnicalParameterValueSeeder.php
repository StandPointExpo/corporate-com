<?php

use Illuminate\Database\Seeder;

use App\Tasks\{ TaskTechnicalParameterPodiumValue, TaskTechnicalParameterLogoValue};

class TaskTechnicalParameterValueSeeder extends Seeder
{
    private $podiumValues = [
        [
            'id'    => 1,
            'value' => 'No',
        ],
        [
            'id'    => 2,
            'value' => 'Standard',
        ],
        [
            'id'    => 3,
            'value' => 'Exclusive',
        ],
    ];

    private $logoValues = [
        [
            'id'    => 1,
            'value' => 'Volume logo without backligh',
        ],
        [
            'id'    => 2,
            'value' => 'Volume logo with backlight',
        ],
        [
            'id'    => 3,
            'value' => 'Cutting ORACAL',
        ],
        [
            'id'    => 4,
            'value' => 'Printed',
        ],
        [
            'id'    => 5,
            'value' => 'Logo-lightbox',
        ],
    ];

    public function __construct()
    {

    }

    public function run()
    {
        collect($this->podiumValues)->each( function ($value) {
            $value = collect($value);
            TaskTechnicalParameterPodiumValue::create([
                'id'    => $value->get('id'),
                'value' => $value->get('value')
            ]);
        });

        collect($this->logoValues)->each( function ($value) {
            $value = collect($value);
            TaskTechnicalParameterLogoValue::create([
                'id'    => $value->get('id'),
                'value' => $value->get('value')
            ]);
        });
    }
}
