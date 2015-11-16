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

        $staff = [
            ['Name' => 'Bogdănel Morcov','Address' => '','PhoneNo' => '','Email' => ''],
            ['Name' => 'Maria Georgeta','Address' => '','PhoneNo' => '','Email' => ''],
            ['Name' => 'John Smith','Address' => '','PhoneNo' => '','Email' => ''],
            ['Name' => 'John Lennon','Address' => '','PhoneNo' => '','Email' => ''],
            ['Name' => 'Jack Lemon','Address' => '','PhoneNo' => '','Email' => ''],
            ['Name' => 'Ionut-Claudiu Herciu','Address' => '16 Tumbling Hill St.','PhoneNo' => '+447404918221','Email' => 'redcat23.com96@gmail.com'],
            ['Name' => 'Cătălin Andrei Diaconu','Address' => 'Laisteridge Lane','PhoneNo' => '+44 7404 124621','Email' => 'A.C.Diaconu@bradford.ac.uk'],
            ['Name' => 'A','Address' => 'B','PhoneNo' => '0','Email' => 'C']
        ];

        DB::table('Staff')->insert($staff);
    }
}
