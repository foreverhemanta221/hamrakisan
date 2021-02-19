<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAddressesTable extends Migration
{
    public function up()
    {
            Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('landmark')->nullable();
            $table->string('nep_landmark')->nullable();
            $table->string('street')->nullable();
            $table->string('city');
            $table->string('nep_city')->nullable();
            $table->string('province');
            $table->string('district');
            $table->string('latitude',50)->nullable();
            $table->string('longitude',50)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
