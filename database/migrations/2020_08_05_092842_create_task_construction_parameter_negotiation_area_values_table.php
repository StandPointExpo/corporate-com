<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskConstructionParameterNegotiationAreaValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_construction_parameter_negotiation_area_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
        });

        Schema::create('task_construction_parameter_tcp_negotiation_area_value', function (Blueprint $table) {
            $table->unsignedBigInteger('task_construction_parameter_id');
            $table->unsignedBigInteger('tcp_negotiation_area_value_id');

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
        Schema::dropIfExists('task_construction_parameter_tcp_negotiation_area_value');
        Schema::dropIfExists('task_construction_parameter_negotiation_area_values');
    }
}
