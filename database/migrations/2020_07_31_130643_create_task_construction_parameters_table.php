<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskConstructionParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_construction_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->string('height_stand')->nullable();
            $table->string('double_decker_stand')->nullable();
            $table->longText('double_decker_notes')->nullable();
            $table->string('suspension_structure')->nullable();
            $table->longText('suspension_notes')->nullable();
            $table->string('floor')->nullable();
            $table->longText('floor_notes')->nullable();
            $table->longText('walls_notes')->nullable();
            $table->string('utility_room')->nullable();
            $table->longText('utility_room_notes')->nullable();
            $table->longText('negotiation_area_notes')->nullable();
            $table->longText('additional_info')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

        Schema::create('task_construction_parameter_walls', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('construction_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('construction_id')->references('id')->on('task_construction_parameters')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_construction_parameter_walls');
        Schema::dropIfExists('task_construction_parameters');
    }
}
