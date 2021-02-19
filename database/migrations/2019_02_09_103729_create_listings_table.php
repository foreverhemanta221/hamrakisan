<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('nep_title')->nullable();
            $table->string('slug');
            $table->mediumText('about');
            $table->mediumText('nep_about')->nullable();
            $table->string('strat_year')->nullable();
            $table->mediumText('services')->nullable();
            $table->mediumText('nep_services')->nullable();
            $table->unsignedInteger('address')->nullable();
            $table->foreign('address')->references('id')->on('addresses');
            $table->unsignedInteger('logo_image')->nullable();
            $table->foreign('logo_image')->references('id')->on('images');
            $table->unsignedInteger('feature_image')->nullable();
            $table->foreign('feature_image')->references('id')->on('images');
            $table->string('color')->nullable();
            $table->string('view')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('status')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('extra')->nullable();
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
        Schema::dropIfExists('listings');
    }
}
