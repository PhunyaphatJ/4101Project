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
            $table->enum('prefix',['MS','MR','MRS']);
            $table->string('name');
            $table->string('surname');
            $table->char('phone',10)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->index(['name','surname'],'name_surname_index');
        });


        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->char('student_id',10)->unique();
            $table->enum('student_type',['no_register','general','internship','former'])->default('no_register');
            $table->enum('department',['CS','IT']);
            $table->mediumInteger('address_id')->unsigned()->nullable();  
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('cascade');
            $table->foreign('email')->references('email')->on('persons')->onDelete('cascade');
            $table->index(['email','student_type'],'student_id_type_index');
        });
        
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->char('professor_id',10)->unique();
            $table->string('remark')->nullable();
            $table->enum('status',['active','no_active'])->default('active');
            $table->boolean('assigned')->default(false);
            $table->timestamp('last_assigned_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('email')->references('email')->on('persons')->onDelete('cascade');
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->enum('status',['active','no_active']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('email')->references('email')->on('persons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('professors');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('persons');
    }
};
