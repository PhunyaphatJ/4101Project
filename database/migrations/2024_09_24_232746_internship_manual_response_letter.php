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
        Schema::create('internship_manual', function (Blueprint $table) {
            $table->mediumIncrements('meual_id')->unsigned();
            $table->string('manual_path');
            $table->string('admin_email');
            $table->foreign('admin_email')->references('email')->on('persons')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('response_letter', function (Blueprint $table) {
            $table->mediumIncrements('response_letter_id')->unsigned();
            $table->string('response_letter_path');
            $table->string('admin_email');
            $table->foreign('admin_email')->references('email')->on('persons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_manual');
        Schema::dropIfExists('response_letter');
    }
};
