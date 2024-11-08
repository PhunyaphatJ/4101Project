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
        Schema::create('internship_details', function (Blueprint $table) {
            $table->char('student_id',10);
            $table->mediumIncrements('internship_detail_id')->unsigned();
            $table->mediumInteger('company_id')->unsigned();
            $table->enum('register_semester',['1','2','S','retake1','retake2']);
            $table->year('year');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('attend_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->unique(['student_id', 'company_id']);
        });

        Schema::create('internship_infos', function (Blueprint $table) {
            $table->char('student_id', 10)->unique();
            $table->mediumIncrements('internship_id')->unsigned();
            $table->char('professor_id',10)->nullable();
            $table->string('mentor_email')->nullable();
            $table->mediumInteger('internship_detail_id')->unsigned()->unique();
            $table->enum('grade',['A','F'])->nullable();
            $table->string('report_file_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('professor_id')->references('professor_id')->on('professors')->onDelete('cascade');
            $table->foreign('mentor_email')->references('email')->on('mentors')->onDelete('cascade');
            $table->foreign('internship_detail_id')->references('internship_detail_id')->on('internship_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_infos');
        Schema::dropIfExists('internship_details');
    }
};
