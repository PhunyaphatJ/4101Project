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
            $table->mediumIncrements('event_id')->unsigned();
            $table->date('date');
            $table->string('student_email');
            $table->string('professor_email');
            $table->foreign('student_email')->references('email')->on('students')->onDelete('cascade');
            $table->foreign('professor_email')->references('email')->on('professors')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->mediumIncrements('notification_id')->unsigned();
            $table->string('sender_email');
            $table->string('receiver_email');
            $table->timestamp('datetime');
            $table->string('subject');
            $table->string('details');
            $table->foreign('sender_email')->references('email')->on('persons')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('notifications');
    }
};
