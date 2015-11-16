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
            $table->integer('ClientID')->unsigned();
            $table->string('Model');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('Cars', function (Blueprint $table) {
            $table->foreign('ClientID')->references('Id')->on('Clients');
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
