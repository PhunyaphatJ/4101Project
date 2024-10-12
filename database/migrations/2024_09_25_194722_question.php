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
        Schema::create('question_forms', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned()->primary();
            $table->string('form_name');            
            $table->timestamps();
        });

        Schema::create('question_parts', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();
            $table->string('part_text');            
            $table->timestamps();
            $table->primary(['form_id', 'part_id']);
            $table->foreign('form_id')->references('form_id')->on('question_forms')->onDelete('cascade');
        });

        Schema::create('question_lists', function (Blueprint $table) {
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();            
            $table->mediumInteger('question_id')->unsigned();  
            $table->string('question_text');            
            $table->timestamps();
            $table->primary(['form_id', 'part_id','question_id']);
            $table->foreign(['form_id', 'part_id'])->references(['form_id', 'part_id'])->on('question_parts');
        });

        Schema::create('evaluation_answers', function (Blueprint $table) {
            $table->mediumIncrements('answer_id')->unsigned();
            $table->mediumInteger('form_id')->unsigned();
            $table->mediumInteger('part_id')->unsigned();            
            $table->mediumInteger('question_id')->unsigned();  
            $table->string('answer')->nullable();
            $table->string('remark')->nullable();
            $table->char('student_id',10);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(['form_id', 'part_id','question_id'])->references(['form_id', 'part_id','question_id'])->on('question_lists')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')->on('internship_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_answers');
        Schema::dropIfExists('question_lists');
        Schema::dropIfExists('question_parts');
        Schema::dropIfExists('question_forms');
    }
};
