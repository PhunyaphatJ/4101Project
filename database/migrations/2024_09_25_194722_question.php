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
        Schema::create('question_form', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned()->primary();
            $table->string('form_name');            
            $table->timestamps();
        });

        Schema::create('question_part', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();
            $table->string('part_text');            
            $table->timestamps();
            $table->foreign('form_id')->references('form_id')->on('question_form')->onDelete('cascade');
            $table->primary(['form_id', 'part_id']);
        });

        Schema::create('question_list', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();            
            $table->mediumInteger('question_id')->unsigned();  
            $table->string('question_text');            
            $table->timestamps();
            $table->primary(['form_id', 'part_id','question_id']);
            $table->foreign(['form_id', 'part_id'])->references(['form_id', 'part_id'])->on('question_part');
        });

        Schema::create('evaluation_answers', function (Blueprint $table) {
            $table->mediumIncrements('answer_id')->unsigned();
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();            
            $table->mediumInteger('question_id')->unsigned();  
            $table->string('answer')->nullable();
            $table->string('remark')->nullable();
            $table->mediumInteger('internship_id')->unsigned();
            $table->timestamps();
            // $table->foreign('form_id')->references('form_id')->on('question_form')->onDelete('cascade');
            // $table->foreign('part_id')->references('part_id')->on('question_part')->onDelete('cascade');
            // $table->foreign('question_id')->references('question_id')->on('question_list')->onDelete('cascade');
            $table->foreign(['form_id', 'part_id','question_id'])->references(['form_id', 'part_id','question_id'])->on('question_list')->onDelete('cascade');
            $table->foreign('internship_id')->references('internship_id')->on('internship_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_answers');
        Schema::dropIfExists('question_list');
        Schema::dropIfExists('question_part');
        Schema::dropIfExists('question_form');
    }
};
