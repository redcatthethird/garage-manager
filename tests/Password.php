<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Password extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPassword()
    {
        $this->visit('/')
             ->see('I forgot my password')
             ->click('I forgot my password')
             ->see('Send email to reset the password');
    }
}
