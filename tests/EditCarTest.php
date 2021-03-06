<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditCarTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testAddClient()
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
             ->click('Add client')
             ->see('Name:')
             ->type('Catalin', 'Name')
             ->type('Bradford BD50NQ Laisteridge Lane','Address')
             ->type('07424023206','PhoneNo')
             ->type('cata112233@gmail.com', 'Email')
             ->press('Add client');   
    }
}
