<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nep_name')->nullable();
            $table->string('slug');
            $table->integer('vendor_id');
            $table->mediumText('description')->nullable();
            $table->double('price');
            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images');
            $table->string('measure_unit');
            $table->text('other_info')->nullable();
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
        Schema::dropIfExists('product');
    }
}
