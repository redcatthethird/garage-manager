<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddClientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddClientOk()
    {
        $user =App\User::first();
        $client=App\Client::all()->last();
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/')
            ->click('Clients')
            ->see('List of clients')
            ->click('Add client')
            ->type('Gica', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei@test.com', 'Email')
            ->press('Add client')
            ->seeInDatabase('clients',['Id'=>$client->Id+1]);
    }
}
