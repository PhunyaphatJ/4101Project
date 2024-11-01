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
        Schema::create('events', function (Blueprint $table) {
            $table->char('student_id',10);
            $table->date('date');
            $table->boolean('sent');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('student_id')->on('internship_infos')->onDelete('cascade');
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->mediumIncrements('notification_id')->unsigned();
            $table->string('sender_email');
            $table->string('receiver_email');
            $table->timestamp('datetime');
            $table->string('subject');
            $table->string('details');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('receiver_email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('events');
    }
};
