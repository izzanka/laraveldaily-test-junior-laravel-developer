<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Companie;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanieTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    protected function setUp() : void{
          parent::setUp();
          $this->user = User::factory()->create();
          $this->actingAs($this->user);
    }

//     public function testWhenNotLogginIn(){
//        $response = $this->get('/');
//        $response->assertRedirect(route('login'));
//     }

    public function testAllowCompanieIndex(){
       $response = $this->get(route('companies.index'));
       $response->assertOk();
    }

    public function testAllowCompanieCreate(){
        $response = $this->get(route('companies.create'));
        $response->assertOk();
    }

//    public function testAllowCompanieStore()
//    {
//        $params = [
//         'name' => 'xiomi',
//         'email' => 'xiomi@gmail.com',
//         'logo' => 'xiomi.png',
//         'website' => 'xiomi.com',
//        ];

//        $response = $this->post(route('companies.store',$params));
//        $response->assertRedirect(route('companies.create'));

//        $this->assertDatabaseHas('companies',$params);
//    }

    public function testAllowCompanieEdit(){
        $companie = Companie::factory()->create();

        $response = $this->get(route('companies.edit',$companie->id));
        $response->assertOk();
    }

//    public function testAllowCompanieUpdate()
//    {
//        $companie = Companie::factory()->create();

//        $params = [
//         'name' => 'xiomi',
//         'email' => 'xiomi@gmail.com',
//         'logo' => 'xiomi.png',
//         'website' => 'xiomi.com',
//        ];

//        $response = $this->put(route('companies.update',$companie->id),$params);
//        $response->assertRedirect(route('companies.edit',$companie->id));

//        $params['name'] = 'Updated';
    
//        $this->assertDatabaseHas('companies',$params);
//    }

    public function testAllowCompanieDelete(){
        $companie = Companie::factory()->create();

        $response = $this->get(route('companies.destroy',$companie->id));
        $response->assertRedirect(route('companies.index'));

        $this->assertDatabaseMissing('companies',['id' => $companie->id]);
    }

}
