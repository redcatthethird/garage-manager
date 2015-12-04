<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddClientFromClientsTest extends TestCase
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
             ->see('Clients')
             ->click('Clients')
             ->seePageIs('/clients')
             ->see('List of clients')
             ->click('Add client')
             ->see('Name:')
             ->press('Add client')
             ->see('Error:');
             //->see('The name field is required.')  
            // ->see('The phone no field is required.');
    }
}
