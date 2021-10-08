<?php

use Illuminate\Database\Seeder;

use App\Tasks\TaskConstructionParameterNegotiationAreaValue;

class TaskConstructionParameterValueSeeder extends Seeder
{
    private $negotiationAreaValues = [
        [
            'id'    => 1,
            'value' => 'No',
        ],
        [
            'id'    => 2,
            'value' => 'Open',
        ],
        [
            'id'    => 3,
            'value' => 'Closed',
        ],
        [
            'id'    => 4,
            'value' => 'Near',
        ],
        [
            'id'    => 5,
            'value' => 'VIP',
        ],
    ];

    public function __construct()
    {

    }

    public function run()
    {
        collect($this->negotiationAreaValues)->each( function ($value) {
            $value = collect($value);
            TaskConstructionParameterNegotiationAreaValue::create([
                'id'    => $value->get('id'),
                'value' => $value->get('value')
            ]);
        });
    }
}
