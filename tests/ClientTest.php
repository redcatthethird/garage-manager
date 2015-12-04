<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends TestCase
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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddClientOk()
    {
        $user =App\User::all()->last();
        $client=App\Client::all()->last();
        $this->actingAs($user)
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

    public function testAddClientFail()
    {
        $user =App\User::all()->last();
        $client=App\Client::count();
        $this->actingAs($user)
            ->visit('/')
            ->click('Clients')
            ->see('List of clients')
            ->click('Add client')
            ->type('', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei', 'Email')
            ->press('Add client');
            $this->assertEquals($client, App\Client::count());
    }


    public function testEditClientOk()
    {
        $user =App\User::all()->last();
        $client=App\Client::all()->last(); 
        $this->actingAs($user)
            ->visit('/clients/'.$client->Id.'/edit')
            ->type('Gica2', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei@test.com', 'Email')
            ->press('Edit client');
        $newClient = App\Client::find(['Id' => $client->Id])->first();
        $this->assertNotEquals($client->Name, $newClient->Name);
            
    }

    public function testEditClientFail()
    {
        $user =App\User::all()->last();
        $client=App\Client::all()->last(); 
        $this->actingAs($user)
            ->visit('/clients/'.$client->Id.'/edit')
            ->type('', 'Name')
            ->type('Bradfordddd, Laisteridgeeeee Lane, Revissss Barber Halls, BD71LD','Address')
            ->type('075113765422', 'PhoneNo')
            ->type('andrei@@test.com', 'Email')
            ->press('Edit client');
        $newClient = App\Client::find(['Id' => $client->Id])->first();
        $this->assertEquals($client->Address, $newClient->Address);
            
    }

    public function testDeleteClientOk()
    {
        $user =App\User::all()->last();
        $client=App\Client::count(); 
        $this->actingAs($user)
            ->call('delete', '/client/'.App\Client::all()->last()->Id);
        
        $this->assertNotEquals($client-1, App\Client::count());
       
    }
}
