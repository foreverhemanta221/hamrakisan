<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories');
            $table->string('title');
            $table->string('nep_title')->nullable();
            $table->string('slug');
            $table->mediumText('description')->nullable();
            $table->mediumText('nep_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images');
            $table->integer('priority')->nullable();
            $table->boolean('featured');
            $table->boolean('status')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
