<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmListFormsTable extends Migration
{

    public function up()
    {
        Schema::create('farm_list_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('farmName',200);
            $table->string('farmerName',200);
            $table->string('farmEmail',200);
            $table->string('farmPhone',200);
            $table->string('farmLocation',255);
            $table->mediumText('farmDescription')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('farm_list_forms');
    }
}
