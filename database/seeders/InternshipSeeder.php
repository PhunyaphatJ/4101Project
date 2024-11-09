<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Admin;
use App\Models\Application;
use App\Models\Company;
use App\Models\Mentor;
use App\Models\Event;
use App\Models\Document;
use App\Models\Internship_detail;
use App\Models\Internship_info;
use App\Models\Evidence;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $professors = Professor::factory()->count(5)->create();
        $admin = Admin::factory()->create();
        
        for ($i=0; $i < 3; $i++) { 
            $students = Student::factory()->count(5)->create();
            $companys = Company::factory()->count(5)->create();
    
            $mentors = [];
            foreach ($companys as $company) {
                $mentors[] = Mentor::factory()->company($company)->create();
            }
    
            //evidence
            foreach ($students as $student) {
                Application::factory()->student($student)->application_type('Internship_Register')->create();
                Evidence::factory()->student($student)->create();
            }
    
            // //Internship_detail
            $internship_detail1 = Internship_detail::factory()->student($students[0])->company($companys[0])->create();
            Application::factory()->student($students[0])->internship_detail( $internship_detail1)->application_type('Internship_Request')->create();
            $internship_detail2 = Internship_detail::factory()->student($students[1])->company($companys[0])->create();
            Application::factory()->student($students[1])->internship_detail( $internship_detail2)->application_type('Internship_Request')->create();
            $internship_detail3 = Internship_detail::factory()->student($students[1])->company($companys[1])->create();
            Application::factory()->student($students[1])->internship_detail( $internship_detail3)->application_type('Internship_Request')->create();
            $internship_detail4 = Internship_detail::factory()->student($students[1])->company($companys[2])->create();
            Application::factory()->student($students[1])->internship_detail( $internship_detail4)->application_type('Internship_Request')->create();
            $internship_detail5 = Internship_detail::factory()->student($students[2])->company($companys[3])->create();
            Application::factory()->student($students[2])->internship_detail( $internship_detail5)->application_type('Internship_Request')->create();
            $internship_detail6 = Internship_detail::factory()->student($students[3])->company($companys[4])->create();
            Application::factory()->student($students[3])->internship_detail( $internship_detail6)->application_type('Internship_Request')->create();
            $internship_detail7 = Internship_detail::factory()->student($students[4])->company($companys[1])->create();
            Application::factory()->student($students[4])->internship_detail( $internship_detail7)->application_type('Internship_Request')->create();
    
            // //Internship_info
            $internship_info = Internship_info::factory()->student($students[0])->professor($professors[0])->mentor($mentors[0])->internship_detail( $internship_detail1)->create();
            Application::factory()->student($students[0])->internship_detail( $internship_detail1)->application_type('Recommendation')->create();
            $internship_info = Internship_info::factory()->student($students[2])->professor($professors[2])->mentor($mentors[3])->internship_detail( $internship_detail5)->create();
            Application::factory()->student($students[2])->internship_detail( $internship_detail5)->application_type('Recommendation')->create();
            $internship_info = Internship_info::factory()->student($students[1])->professor($professors[1])->mentor($mentors[2])->internship_detail( $internship_detail4)->create();
            Application::factory()->student($students[1])->internship_detail( $internship_detail4)->application_type('Recommendation')->create();
            $internship_info = Internship_info::factory()->student($students[4])->professor($professors[4])->mentor($mentors[4])->internship_detail( $internship_detail6)->create();
            Application::factory()->student($students[4])->internship_detail( $internship_detail6)->application_type('Recommendation')->create();
            $internship_info = Internship_info::factory()->student($students[3])->professor($professors[3])->mentor($mentors[1])->internship_detail( $internship_detail7)->create();
            Application::factory()->student($students[3])->internship_detail( $internship_detail7)->application_type('Recommendation')->create();
    
    
            // //Appreciation
            Application::factory()->internship_detail( $internship_detail1)->appreciation($professors[0],$students[0])->create();
            Application::factory()->internship_detail( $internship_detail4)->appreciation($professors[1],$students[1])->create();
            Application::factory()->internship_detail( $internship_detail5)->appreciation($professors[2],$students[2])->create();
            Application::factory()->internship_detail( $internship_detail6)->appreciation($professors[3],$students[3])->create();
            Application::factory()->internship_detail( $internship_detail7)->appreciation($professors[4],$students[4])->create();
    
            // //Event
            Event::factory()->student($internship_info)->create();
    
            // //Document
            Document::factory()->admin($admin)->count(3)->create();
        }

    }
}
