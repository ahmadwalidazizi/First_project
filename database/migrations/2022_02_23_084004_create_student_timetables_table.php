<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_timetables', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            //$table->integer('group_id');
            $table->string('day');
            $table->string('teacher_1');
            $table->string('teacher_2');
            $table->string('teacher_3');
            $table->string('teacher_4');
            $table->string('teacher_5');
            $table->string('teacher_6');
            $table->string('teacher_7');
            $table->string('subject_1');
            $table->string('subject_2');
            $table->string('subject_3');
            $table->string('subject_4');
            $table->string('subject_5');
            $table->string('subject_6');
            $table->string('subject_7');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_timetables');
    }
}
