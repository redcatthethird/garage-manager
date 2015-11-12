<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
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
        DB::table('Staff')->delete();

        $staff = array(
  array('Id' => '1','Name' => 'Bogdănel Morcov','Address' => '','PhoneNo' => '','Email' => '','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00'),
  array('Id' => '2','Name' => 'Maria Georgeta','Address' => '','PhoneNo' => '','Email' => '','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00'),
  array('Id' => '3','Name' => 'John Smith','Address' => '','PhoneNo' => '','Email' => '','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00'),
  array('Id' => '4','Name' => 'John Lennon','Address' => '','PhoneNo' => '','Email' => '','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00'),
  array('Id' => '5','Name' => 'Jack Lemon','Address' => '','PhoneNo' => '','Email' => '','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00'),
  array('Id' => '6','Name' => 'Ionut-Claudiu Herciu','Address' => '16 Tumbling Hill St.','PhoneNo' => '+447404918221','Email' => 'redcat23.com96@gmail.com','created_at' => '2015-10-30 01:53:12','updated_at' => '2015-10-30 01:53:12'),
  array('Id' => '7','Name' => 'Cătălin Andrei Diaconu','Address' => 'Laisteridge Lane','PhoneNo' => '+44 7404 124621','Email' => 'A.C.Diaconu@bradford.ac.uk','created_at' => '2015-10-30 02:09:10','updated_at' => '2015-10-30 02:09:10'),
  array('Id' => '8','Name' => 'A','Address' => 'B','PhoneNo' => '0','Email' => 'C','created_at' => '2015-10-30 04:01:43','updated_at' => '2015-10-30 04:01:43')
);

        DB::table('Staff')->insert($staff);
    }
}
