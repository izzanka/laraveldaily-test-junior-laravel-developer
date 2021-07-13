<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    protected function setUp() : void{
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

//    public function testWhenNotLogginIn(){
//        $response = $this->get('/');
//        $response->assertRedirect(route('login'));
//    }

   public function testAllowEmployeeIndex(){
       $response = $this->get(route('employees.index'));
       $response->assertOk();
       $response->assertViewIs('employee.index');
   }

   public function testAllowEmployeeCreate(){
        $response = $this->get(route('employees.create'));
        $response->assertOk();
        $response->assertViewIs('employee.create');
   }

   public function testAllowEmployeeStore()
   {
       $params = [
        'first_name' => 'izzan',
        'last_name' => 'ka',
        'email' => 'izzan@gmail.com',
        'companie_id' => 7,
        'phone' => 949494949494
       ];

       $response = $this->post(route('employees.store',$params));
       $response->assertRedirect(route('employees.create'));

       $this->assertDatabaseHas('employees',$params);
   }

   public function testAllowEmployeeEdit(){
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.edit',$employee->id));
        $response->assertOk();
        $response->assertViewIs('employee.edit');
   }

   public function testAllowEmployeeUpdate()
   {
       $employee = Employee::factory()->create();

       $params = [
        'first_name' => 'Updated',
        'last_name' => 'ka',
        'email' => 'izzan@gmail.com',
        'companie_id' => 7,
        'phone' => 949494949494
       ];

       $response = $this->put(route('employees.update',$employee->id),$params);
       $response->assertRedirect(route('employees.edit',$employee->id));

       $params['first_name'] = 'Updated';
    
       $this->assertDatabaseHas('employees',$params);
   }

   public function testAllowEmployeeDelete()
   {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.destroy',$employee->id));
        $response->assertRedirect(route('employees.index'));

        $this->assertDatabaseMissing('employees',['id' => $employee->id]);
   }

   

}
