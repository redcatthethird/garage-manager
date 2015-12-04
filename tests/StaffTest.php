<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StaffTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddStaffOk()
    {
        $user =App\User::all()->last();
        $staff=App\Staff::all()->last();
        $this->actingAs($user)
            ->visit('/')
            ->click('Staff')
            ->see('List of staff')
            ->click('Create')
            ->type('Gica', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei@test.com', 'Email')
            ->press('Add staff')
            ->seeInDatabase('staff',['Id'=>$staff->Id+1]);
    }

    public function testAddStaffFail()
    {
        $user =App\User::all()->last();
        $staff=App\Staff::count();
        $this->actingAs($user)
            ->visit('/')
            ->click('Staff')
            ->see('List of staff')
            ->click('Create')
            ->type('', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei', 'Email')
            ->press('Add staff');
            $this->assertEquals($staff, App\Staff::count());
    }


    public function testEditStaffOk()
    {
        $user =App\User::all()->last();
        $staff=App\Staff::all()->last(); 
        $this->actingAs($user)
            ->visit('/staff/'.$staff->Id.'/edit')
            ->type('Gica2', 'Name')
            ->type('Bradford, Laisteridge Lane, Revis Barber Halls, BD71LD','Address')
            ->type('07511376542', 'PhoneNo')
            ->type('andrei@test.com', 'Email')
            ->press('Edit staff');
        $newStaff = App\Staff::find(['Id' => $staff->Id])->first();
        $this->assertNotEquals($staff->Name, $newStaff->Name);
            
    }

    public function testEditStaffFail()
    {
        $user =App\User::all()->last();
        $staff=App\Staff::all()->last(); 
        $this->actingAs($user)
            ->visit('/staff/'.$staff->Id.'/edit')
            ->type('', 'Name')
            ->type('Bradfordddd, Laisteridgeeeee Lane, Revissss Barber Halls, BD71LD','Address')
            ->type('075113765422', 'PhoneNo')
            ->type('andrei@@test.com', 'Email')
            ->press('Edit staff');
        $newStaff = App\Staff::find(['Id' => $staff->Id])->first();
        $this->assertEquals($staff->Address, $newStaff->Address);
            
    }

    public function testDeleteStaffOk()
    {
        $user =App\User::all()->last();
        $staff=App\Staff::count(); 
        $this->actingAs($user)
            ->call('delete', '/staff/'.App\Staff::all()->last()->Id);
        
        $this->assertNotEquals($staff-1, App\Staff::count());
       
    }
}
