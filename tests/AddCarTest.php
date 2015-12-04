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
    public function testAddCarOk()
    {
        $user =App\User::first();
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/')
            ->click('Cars')
            ->see('List of cars')
            ->click('Add car')
            ->type('DB05RON', 'LicencePlate')
            ->select(App\Client::first()->Id,'ClientId')
            ->type('','Model')
            ->press('Add car')
            ->seeInDatabase('cars',['LicencePlate'=>'DB05RON']);
    }
}
