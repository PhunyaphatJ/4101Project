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
use Illuminate\Foundation\Testing\WithFaker;

class AdminTest extends TestCase
{


    // use RefreshDatabase, WithFaker;
    // protected $admin;
    // protected $user;
    public function test_the_application_returns_a_suscessful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     // สร้าง admin user
    //     $this->admin = User::factory()->create([
    //         'email' => 'admin@example.com',
    //         'role' => 'admin'
    //     ]);


    // }
}
