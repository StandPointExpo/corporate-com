<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('portfolio_id');
            $table->string('file');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('is_main')->default(false);

            $table->timestamps();

            $table->foreign('portfolio_id')->references('id')->on('portfolios')
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
        Schema::dropIfExists('portfolio_images');
    }
}
