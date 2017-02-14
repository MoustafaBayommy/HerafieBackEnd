<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client');
            $table->string('adressText');
            $table->float('adressLong');
            $table->float('adressAlti');
            $table->string('orderStutes')->default('new');
            $table->string('mainServiceType');
            $table->string('serviceType');
            $table->string('placeType');
            $table->date('onDate');
            $table->string('onTime');
            $table->text('textDescription');
            $table->string('fileDescription');
            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
