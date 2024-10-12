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
        Schema::create('documents', function (Blueprint $table) {
            $table->mediumIncrements('document_id')->unsigned();
            $table->string('document_path');
            $table->string('document_type');
            $table->string('admin_email');
            $table->timestamps();
            $table->foreign('admin_email')->references('email')->on('admins');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
