<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->delete();

        $users = array(
  array('id' => '1','name' => 'John','email' => 'a@b.c','password' => '$2a$04$GLvuskeyy4XVVVfnpKBEOuL3utGV2hAYGsi2oHINmbGdl2YQq7Rd2','isAdmin' => '0','remember_token' => 'xex2kK0XqWy96ZoITGxuDIJOiLQyVt9xpq5hVtMkwUpiCVUZxS8Aq6SsrLfu','created_at' => '0000-00-00 00:00:00','updated_at' => '2015-11-16 16:42:33'),
  array('id' => '2','name' => 'Andrew','email' => 'andrei@gmail.com','password' => '$2a$04$7mqnrVQ.8WmjW2VWTdidtuj8cYwW6PhyRp5Eqz.iXp/sSoTP9Cf26','isAdmin' => '1','remember_token' => 'RlShDySMTSloNg4hOe1RykAna9mMFeXOtgmMk9W9mHHer7uXEhfzqaeRmubT','created_at' => '0000-00-00 00:00:00','updated_at' => '2015-11-16 16:44:23')
);

        DB::table('Users')->insert($users);
    }
}
