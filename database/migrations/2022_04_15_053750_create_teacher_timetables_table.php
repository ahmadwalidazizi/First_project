<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_timetables', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('day');
            $table->string('class_1');
            $table->string('class_2');
            $table->string('class_3');
            $table->string('class_4');
            $table->string('class_5');
            $table->string('class_6');
            $table->string('class_7');
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
        Schema::dropIfExists('teacher_timetables');
    }
}
