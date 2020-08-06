<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTechnicalParameterPodiumValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_technical_parameter_podium_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
        });

        Schema::create('task_technical_parameter_task_technical_parameter_podium_value', function (Blueprint $table) {
            $table->unsignedBigInteger('task_technical_parameter_id');
            $table->unsignedBigInteger('task_technical_parameter_podium_value_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_technical_parameter_task_technical_parameter_podium_value');
        Schema::dropIfExists('task_technical_parameter_podium_values');
    }
}
