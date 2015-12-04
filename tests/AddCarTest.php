<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddCarTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
	     ->type('a@b.c', 'email')
             ->type ('panarama', 'password')
             ->press('Sign In')
             ->seePageIs('/')
             ->see('Cars')
             ->click('Cars')
             ->seePageIs('/cars')
             ->see('List of cars')
             ->click('Add car')
             ->see('Licence plate:')
             ->type('DB05Rom', 'LicencePlate')
             ->select('1','ClientId')
             ->type('BMW','Model')
             ->press('Add car');   
    }
}
