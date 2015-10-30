<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
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
        DB::table('Clients')->delete();

        $clients = [
            ['Name' => 'Who Knows','Address' => '53 Bird\'s St, Abbingdon','PhoneNo' => '+44 7402182264','Email' => 'margo@great.cool'],
            ['Name' => 'Andrei Negrea','Address' => '15 Boole Rd, Halifax','PhoneNo' => '07412 132 532','Email' => 'A.Negrea@bradford.ac.uk'],
            ['Name' => 'Ionuț-Claudiu Herciu','Address' => '16 Tumbling Hill St, Bradford','PhoneNo' => '7404 918 221','Email' => 'I.C.Herciu@bradford.ac.uk']
        ];

        DB::table('Clients')->insert($clients);
    }
}
