<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_id');
            $table->foreign('farm_id')->references('id')->on('listings')->onDelete('cascade');
            $table->string('name');
            $table->string('nep_name')->nullable();
            $table->string('minimum_quantity')->nullable();
            $table->string('measure_unit')->nullable();
            $table->double('price')->nullable();
            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images');
            $table->boolean('is_available');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_products');
    }
}
