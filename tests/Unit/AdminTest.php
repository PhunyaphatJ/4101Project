<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Person;
use App\Models\Student;
use App\Models\Address;
use App\Models\Professor;
use App\Models\Application;
use App\Models\Evidence;
use App\Models\Internship_detail;
use App\Models\Internship_info;
use App\Models\Company;
use App\Models\Mentor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
// use admin
use App\Models\Admin;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_admin_can_be_created()
    {
        $admin = Admin::factory()->create();

        $this->assertDatabaseHas('admins', [
            'id' => $admin->id,
        ]);
    }
    //test role admin
    
    public function test_can_create_person()
    {
        $persons = Person::factory()->create([
            'email' => 'test@example.com',
        ]);

    }
}
