<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cars', function (Blueprint $table) {
            $table->string('LicencePlate', 10);
            $table->primary('LicencePlate');
            $table->integer('ClientId')->unsigned();
            $table->string('Model');
            $table->timestamps();
        });

        Schema::table('Cars', function (Blueprint $table) {
            $table->foreign('ClientId')->references('Id')->on('Clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cars');
    }
}
