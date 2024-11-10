<?php

namespace Tests\Unit\Models;
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


class StudentTest extends TestCase
{
    // public function test_the_application_returns_a_suscessful_response():void{
    //     $response = $this->get('/');
    //     $response->assertStatus(200);
    // }
    
    public function create_student($address_id = null){
        $user = User::create([
            'email' => 'student1@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'student',
        ]);
    }
// use RefreshDatabase;
    /*
        $person = Person::create([
            'email' => $user->email,
            'prefix' => 'MR',
            'name' => 'Student1',
            'surname' => "StudentS",
            'phone' => '093421532',
        ]);

        $student = Student::create([
            'email'=>$person->email,
            'student_id'=>'705004952',
            'student_type'=>'no_register',
            'department'=>"CS",
            "address_id"=>$address_id,
        ]);

        return array($user,$person,$student);

    }

    private function create_professor(){
        $user = User::create([
            'email' => 'professor1@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'professor',
        ]);

        $person = Person::create([
            'email'=>$user->email,
            'prefix'=>'MR',
            'name'=>'professor',
            'surname'=>"professor",
            'phone' =>'093421532',
        ]);

        $professor = Professor::create([
            'email'=>$person->email,
            'professor_id'=>'1234567',
            'remark'=>'test',
            'status'=>'active',
            "running_number"=>0,
            "assigned"=>true,
        ]);

        return $professor;

    }

    private function create_company(){
        $companys = [];

        $data =[
            [
                'company_name'=>'company1',
                'phone'=>'12345566',
                'address_id'=>1,
                'fax'=>'1234'
            ],
            [
                'company_name'=>'company2',
                'phone'=>'12345566',
                'address_id'=>1,
                'fax'=>'1234'
            ],
        ];
        
        foreach ($data as $item) {
            $companys[] = Company::create($item);
        }

        $mentors = Mentor::insert([
            [
                'email'=>'mentor1@example.com',
                'name'=>'mentor1',
                'surname'=>'mentor1',
                'phone'=>'1234567',
                'company_id'=>$companys[0]->company_id,
            ],
            [
                'email'=>'mentor2@example.com',
                'name'=>'mentor2',
                'surname'=>'mentor2',
                'phone'=>'1234567',
                'company_id'=>$companys[1]->company_id,
            ],
        ]);

        return $companys;

    }

    public function test_it_can_create_student()
    {
        list($user,$person,$student) = $this->create_student();

        // $user = User::factory()->create();
        // $person = Person::factory()->create();
        // $user = Person::factory()->create();
    
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'role' =>'student',
        ]);
    

        $this->assertDatabaseHas('persons', 
        [
            'email' => $person->email,
            'prefix'=>'MR.',
            'name'=>'Student1',
            'surname'=>"StudentS",
            'phone' =>'093421532',        
        ]);

        $this->assertDatabaseHas('students', 
        [
            'email'=>$student->email,
            'student_id'=>'705004952',
            'student_type'=>'no_register',
            'department'=>"CS"        
        ]);
    }

    public function test_it_relate_to_person_and_user(){
        list($user,$person,$student) = $this->create_student();

        $this->assertTrue($student->person()->is($person));
        $this->assertTrue($person->user()->is($user));
        $this->assertTrue($person->student()->is($student));
        $this->assertTrue($user->person()->is($person));
    }

    public function test_it_can_relate_to_address(){
        $address = Address::create([
            'house_no'=>'9/9',
            'village_no'=>'99',
            'sub_district'=>"huamak",
            'district'=>'bang kapi',
            'province'=>'Krung Thep Maha Nakhon',
            'postal_code'=>'10204',
        ]);
        
        $this->assertDatabaseHas('addresses', [
            'address_id' => $address->address_id,
        ]);

        list($user,$person,$student) = $this->create_student($address->address_id);

        $this->assertTrue($student->address()->is($address));
        $this->assertTrue($address->student()->is($student));


    }
    
    public function test_it_can_delete_a_student()
    {
        list($user,$person,$student) = $this->create_student();
        $user->delete();

        $this->assertSoftDeleted('students', ['email' => $student->email]);
        $this->assertSoftDeleted('persons', ['email' => $person->email]);
        $this->assertSoftDeleted('users', ['email' => $user->email]);

        $user->forceDelete();
        $this->assertDatabaseMissing('users', ['email' => $user->email]);
        $this->assertDatabaseMissing('persons', ['email' => $person->email]);
        $this->assertDatabaseMissing('students', ['email' => $student->email]);
    }

    public function test_it_can_create_internship_info(){
        $address = Address::create([
            'house_no'=>'9/9',
            'village_no'=>'99',
            'sub_district'=>"huamak",
            'district'=>'bang kapi',
            'province'=>'Krung Thep Maha Nakhon',
            'postal_code'=>'10204',
        ]);
        list($user,$person,$student) = $this->create_student($address->address_id);
        $professor = $this->create_professor();
        $company = $this->create_company();
        $evidence = Evidence::create([
            'student_id'=>'705004952',
            'credit'=>100,
            'idcard_path'=>'c://',
            'transcript_path'=>'c://',
            'recentreceipt_path'=>'c://',
        ]);

        $internship_details = [];

        $data = [
            [
                'student_id' => '705004952',
                'company_id' => $company[0]->company_id,
                'register_semester' => '1',
                'year' => 2024,
                'start_date' => '2024-10-13',
                'end_date' => '2024-10-13',
                'attend_to' => 'miss123',
            ],
            [
                'student_id' => '705004952',
                'company_id' => $company[1]->company_id,
                'register_semester' => '2',
                'year' => 2024,
                'start_date' => '2024-10-13',
                'end_date' => '2024-10-13',
                'attend_to' => 'miss123',
            ],
              
        ];

        foreach ($data as $item) {
            $internship_details[] = Internship_detail::create($item);
        }

        $applications = Application::insert([
            [
                'student_id'=>'705004952',
                'applicant_email'=>'student1@example.com',
                'application_type'=>'Internship_Register',
                'application_status'=>'completed',
                'internship_detail_id'=>null,
                'sent'=>now(),
            ],
            [
                'student_id'=>'705004952',
                'applicant_email'=>'student1@example.com',
                'application_type'=>'Internship_Request',
                'application_status'=>'completed',
                'internship_detail_id'=>$internship_details[0]->internship_detail_id,
                'sent'=>now(),
            ],
            [
                'student_id'=>'705004952',
                'applicant_email'=>'student1@example.com',
                'application_type'=>'Internship_Request',
                'application_status'=>'completed',
                'internship_detail_id'=>$internship_details[1]->internship_detail_id,
                'sent'=>now(),
            ],
            [
                'student_id'=>'705004952',
                'applicant_email'=>'student1@example.com',
                'application_type'=>'Recommendation',
                'application_status'=>'completed',
                'internship_detail_id'=>$internship_details[0]->internship_detail_id,
                'sent'=>now(),
            ],
            [
                'student_id'=>'705004952',
                'applicant_email'=>'Professor1@example.com',
                'application_type'=>'Appreciation',
                'application_status'=>'document_pending',
                'internship_detail_id'=>$internship_details[0]->internship_detail_id,
                'sent'=>now(),
            ],
        ]);

        $internship_info = Internship_info::create([
            'student_id'=>'705004952',
            'professor_id'=>$professor->professor_id,
            'mentor_email'=>$company[0]->mentors[0]->email,
            'internship_detail_id'=>$internship_details[0]->internship_detail_id,
        ]);
    }

    public function test_it_can_recovery_delete()
    {
        list($user,$person,$student) = $this->create_student();
        $user->delete();

        $this->assertSoftDeleted('students', ['email' => $student->email]);
        $this->assertSoftDeleted('persons', ['email' => $person->email]);
        $this->assertSoftDeleted('users', ['email' => $user->email]);

        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
            'deleted_at' => null, 
        ]);
        
        $user->restore();
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    } */
}
