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
        	['name' => 'Bogdănel Morcov'],
        	['name' => 'Maria Georgeta'],
        	['name' => 'John Smith'],
            ['name' => 'John Lennon'],
        	['name' => 'Jack Lemon']
        );

        DB::table('Staff')->insert($staff);
    }
}
