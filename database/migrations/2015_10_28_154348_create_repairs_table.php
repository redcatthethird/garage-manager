<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Repairs', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('LicencePlate', 10);
            $table->integer('StaffId')->unsigned();
            $table->boolean('Ongoing')->default(true);
            $table->string('Type');
            $table->text('Comments')->default('');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->double('Cost');
            $table->boolean('Paid')->default(false);
            $table->timestamps();
        });

        Schema::table('Repairs', function (Blueprint $table) {
            $table->foreign('LicencePlate')->references('LicencePlate')->on('Cars');
            $table->foreign('StaffId')->references('Id')->on('Staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Repairs');
    }
}
