<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('task_files', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->unsignedBigInteger('user_id')->nullable();
//            $table->unsignedBigInteger('project_id')->nullable();
//            $table->boolean('publication')->default(false);
//            $table->string('file_position')->nullable();
//            $table->string('file_name')->unique();
//            $table->string('file_original_name');
//            $table->string('file_type');
//            $table->string('file_guid');
//            $table->string('file_guid_original');
//            $table->string('file_source');
//            $table->string('file_share');
//            $table->longText('file_comment')->nullable();
//            $table->string('extension');
//            $table->softDeletes();
//            $table->timestamps();
//
//            $table->foreign('project_id')->references('id')->on('projects')
//                ->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')
//                ->onUpdate('cascade')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('task_files');
    }
}
