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
        Schema::create('address', function (Blueprint $table) {
            $table->increments('address_id');
            $table->string('house_no');
            $table->string('village_no');
            $table->string('road');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('postal_code');
            $table->timestamps();
            $table->index('address_id','address_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
