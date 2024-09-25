<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->mediumIncrements('application_id')->unsigned();
            $table->enum('application_name',['ลงทะเบียนฝึกงาน','หนังสือขอความอนุเคราะห์','หนังสือส่งตัว','หนังสือขอบคุณ']);
            $table->enum('document_status',['approval_pending','reject','document_pending','completed']);
            $table->string('student_email');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_email')->references('email')->on('students')->onDelete('cascade');
        });

        Schema::create('internship_registers', function (Blueprint $table) {
            $table->mediumIncrements('application_id')->unsigned();
            $table->char('student_id',10);
            $table->integer('credit');
            $table->enum('department',['CS','IT']);
            $table->string('transcript_path');
            $table->string('idcard_path');
            $table->string('recentreceipt_path');
            $table->timestamps();
            $table->foreign('application_id')->references('application_id')->on('applications')->onDelete('cascade');
        });

        Schema::create('internship_app_info', function (Blueprint $table) {
            $table->mediumIncrements('internship_app_info_id')->unsigned();
            $table->string('company_name');
            $table->mediumInteger('company_address')->unsigned();
            $table->char('company_phone',10)->nullable();
            $table->char('company_fax',10)->nullable();
            $table->enum('register_semester',['1','2','S','retake1','retake2']);
            $table->year('year');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('attend_to')->nullable();
            $table->foreign('company_address')->references('address_id')->on('address')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('internship_request_apps', function (Blueprint $table) {
            $table->mediumInteger('application_id')->unsigned();
            $table->mediumInteger('internship_app_info_id')->unsigned();
            $table->timestamps(); 
            $table->foreign('application_id')->references('application_id')->on('applications')->onDelete('cascade');
            $table->foreign('internship_app_info_id')->references('internship_app_info_id')->on('internship_app_info')->onDelete('cascade'); 
        });

        Schema::create('recommendation_apps', function (Blueprint $table) {
            $table->mediumInteger('application_id')->unsigned();
            $table->mediumInteger('internship_app_info_id')->unsigned();
            $table->string('mentor_email');
            $table->string('mentor_position')->nullable();
            $table->char('mentor_fax',10)->nullable();
            $table->char('mentor_phone',10)->nullable();
            $table->string('response_letter_path');
            $table->timestamps();
            $table->foreign('application_id')->references('application_id')->on('applications')->onDelete('cascade');
            $table->foreign('internship_app_info_id')->references('internship_app_info_id')->on('internship_app_info')->onDelete('cascade'); 
        });

        Schema::create('appreciation_apps', function (Blueprint $table) {
            $table->mediumInteger('application_id')->unsigned();
            $table->string('professor_email');
            $table->mediumInteger('company_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('application_id')->references('application_id')->on('applications')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companys')->onDelete('cascade'); 
            $table->foreign('professor_email')->references('email')->on('professors')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_registers');
        Schema::dropIfExists('internship_request_apps');
        Schema::dropIfExists('recommendation_apps');
        Schema::dropIfExists('appreciation_apps');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('internship_app_info');
    }
};
