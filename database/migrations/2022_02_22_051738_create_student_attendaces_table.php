<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendaces', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('student_id == user_id');
            $table->integer('assign_student_id')->comment('assgin_student_id == assign_student');
            $table->integer('class_id');
            $table->integer('group_id');
            $table->date('date');
            $table->string('attend_status');
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
        Schema::dropIfExists('student_attendaces');
    }
}
