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
        Schema::create('addresses', function (Blueprint $table) {
            $table->mediumIncrements('address_id')->unsigned();
            $table->string('house_no');
            $table->string('village_no')->nullabe();
            $table->string('road')->nullable();
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('postal_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
