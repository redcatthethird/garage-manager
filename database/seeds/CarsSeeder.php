<?php

use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Repairs')->delete();
        DB::table('Cars')->delete();

        $cars = array(
            array('LicencePlate' => 'A555WOW','ClientID' => '2','Model' => 'Dacia 1310'),
            array('LicencePlate' => 'BD51SMR','ClientID' => '1','Model' => 'Audi A5'),
            array('LicencePlate' => 'BU62GER','ClientID' => '2','Model' => 'Bugatti Veyron')
        );


        DB::table('Cars')->insert($cars);
    }
}
