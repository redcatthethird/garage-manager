<?php

use Illuminate\Database\Seeder;

class RepairsSeeder extends Seeder
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

        $repairs = array(
        array('LicencePlate' => 'BD51SMR','StaffID' => '1','Ongoing' => '1','Type' => 'filter change','Comments' => 'It was completely shattered.','StartDate' => '2015-10-24','EndDate' => '2015-10-30','Cost' => '250'),
        array('LicencePlate' => 'BD51SMR','StaffID' => '4','Ongoing' => '0','Type' => 'replace left rear wheel','Comments' => 'Yup.','StartDate' => '2015-09-01','EndDate' => '2015-10-01','Cost' => '125'),
        array('LicencePlate' => 'BU62GER','StaffID' => '2','Ongoing' => '1','Type' => 'window replacement','Comments' => 'We the best.','StartDate' => '2015-10-01','EndDate' => '2015-10-31','Cost' => '170'),
        array('LicencePlate' => 'BU62GER','StaffID' => '5','Ongoing' => '1','Type' => 'broken roof','Comments' => '', 'StartDate' => '2015-10-06','EndDate' => '2015-12-31','Cost' => '530')
        );

        DB::table('Repairs')->insert($repairs);
    }
}
