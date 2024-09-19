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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->enum('prefix',['MS','MR','MRS']);
            $table->string('name');
            $table->string('surname');
            $table->char('phone',10);
            $table->timestamps();
            $table->softDeletes();
            $table->index('email','email_index');
        });


        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->foreign('email')->references('email')->on('persons')->onDelete('cascade');
            $table->char('student_id',10)->unique();
            $table->enum('student_type',['no_register','general','internship','former']);
            $table->enum('department',['CS','IT']);
            $table->unsignedInteger('address_id');  
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['email','student_type'],'student_id_type_index');
        });
        
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->char('professor_id',10)->unique();
            $table->string('remark');
            $table->enum('status',['active','no_active']);
            $table->integer('running_number');
            $table->boolean('assigned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
        Schema::dropIfExists('students');
        Schema::dropIfExists('professors');
    }
};
