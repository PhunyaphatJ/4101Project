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
            $table->char('student_id',10);
            $table->string('applicant_email');
            $table->enum('application_type',['Internship_Register','Internship_Request','Recommendation','Appreciation']);
            $table->enum('application_status',['approval_pending','reject','document_pending','completed']);
            $table->mediumInteger('notification_id')->unsigned()->unique();
            $table->mediumInteger('internship_detail_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('applicant_email')->references('email')->on('persons')->onDelete('cascade');
            $table->foreign('internship_detail_id')->references('internship_detail_id')->on('internship_details')->onDelete('cascade');
            $table->foreign('notification_id')->references('notification_id')->on('notifications')->onDelete('cascade');
        });

        Schema::create('evidences', function (Blueprint $table) {
            $table->char('student_id',10)->primary();
            $table->integer('credit');
            $table->string('idcard_path');
            $table->string('transcript_path');
            $table->string('recentreceipt_path');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
        Schema::dropIfExists('evidences');
    }
};
