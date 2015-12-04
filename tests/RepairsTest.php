<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepairsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddRepairOk()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count+1, App\Repair::count());
    }

    public function testAddRepairSelectFail1()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select('', 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }
    public function testAddRepairSelectFail2()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select('', 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }
    public function testAddRepairSelectFail3()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select('', 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }

    public function testAddRepairTypeFail()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->type('', 'Type')
            ->type('2016-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }

    public function testAddRepairDateFail1()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2015-02-14', 'StartDate')
            ->type('2016-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }
    public function testAddRepairDateFail2()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14', 'StartDate')
            ->type('2015-02-16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }
    public function testAddRepairDateFail3()
    {
        $user =App\User::all()->last();
        $count=App\Repair::count();
        $this->actingAs($user)
            ->visit('/repairs/create')
            ->select(App\Car::all()->last()->LicencePlate, 'LicencePlate')
            ->select(App\Staff::all()->last()->Id, 'StaffId')
            ->check('Ongoing')
            ->type('Oil change', 'Type')
            ->type('Just a routine exercise.', 'Comments')
            ->type('2016-02-14asd', 'StartDate')
            ->type('2016/02/16', 'EndDate')
            ->type('50', 'Cost')
            ->press('Add repair');
        $this->assertEquals($count, App\Repair::count());
    }
/*
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
       
    }*/
}
