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
        Schema::create('companys', function (Blueprint $table) {
            $table->mediumIncrements('company_id')->unsigned();
            $table->string('company_name');
            $table->char('phone',10);
            $table->mediumInteger('address_id')->unsigned();
            $table->foreign('address_id')->references('address_id')->on('address')->onDelete('cascade');
            $table->char('fax',10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mentors', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('name');
            $table->string('surname');
            $table->string('position')->nullable();
            $table->char('phone',10)->nullable();
            $table->char('fax',10)->nullable();
            $table->mediumInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('company_id')->on('companys')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
        Schema::dropIfExists('companys');
    }
};
