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
        Schema::create('internship_infos', function (Blueprint $table) {
            $table->mediumIncrements('internship_id')->unsigned();
            $table->string('student_email');
            $table->string('professor_email');
            $table->string('mentor_email');
            $table->mediumInteger('company_id')->unsigned();
            $table->enum('register_semester',['1','2','s','retake1','retake2']);
            $table->year('year');
            $table->date('start_date'); //YYYY-MM-DD
            $table->date('end_date');
            $table->enum('grade',['A','F'])->nullable();
            $table->foreign('student_email')->references('email')->on('students')->onDelete('cascade');
            $table->foreign('professor_email')->references('email')->on('professors')->onDelete('cascade');
            $table->foreign('mentor_email')->references('email')->on('mentors')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companys')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('internship_reports', function (Blueprint $table) {
            $table->mediumIncrements('internship_report')->unsigned();
            $table->mediumInteger('internship_id')->unsigned();
            $table->string('file_part');
            $table->foreign('internship_id')->references('internship_id')->on('internship_infos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_reports');
        Schema::dropIfExists('internship_infos');
    }
};
