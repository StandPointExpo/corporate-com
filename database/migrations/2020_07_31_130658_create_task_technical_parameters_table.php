<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTechnicalParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_technical_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->longText('lighting_notes')->nullable();
            $table->longText('storefronts_notes')->nullable();
            $table->longText('podium_notes')->nullable();
            $table->string('reception_desk')->nullable();
            $table->longText('reception_desk_notes')->nullable();
            $table->longText('logo_notes')->nullable();
            $table->longText('multimedia_notes')->nullable();
            $table->string('furnishings_room')->nullable();
            $table->longText('furnishings_notes')->nullable();
            $table->longText('devices')->nullable();
            $table->longText('additional_info')->nullable();

            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

        foreach (['task_technical_lightings', 'task_technical_storefronts', 'task_technical_multimedia', 'task_technical_furnishings'] as $relatedTableName) {
            Schema::create($relatedTableName, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('technical_parameters_id');
                $table->string('value');

                $table->foreign('technical_parameters_id')->references('id')
                    ->on('task_technical_parameters')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_technical_furnishings');
        Schema::dropIfExists('task_technical_multimedia');
        Schema::dropIfExists('task_technical_storefronts');
        Schema::dropIfExists('task_technical_lightings');
        Schema::dropIfExists('task_technical_parameters');
    }
}
