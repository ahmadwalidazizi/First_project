<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('class_id');
            $table->integer('transport_id');
            $table->integer('year_id');
            //$table->integer('group_id');
            $table->integer('shift_id');
            $table->string('registration_date');
            $table->string('base_number');
            $table->string('father_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('tazkira_no')->nullable();
            $table->date('dob')->nullable(); 
            $table->string('birth_place')->nullable();
            $table->string('tazkira_image')->nullable();
            //parent fields
            $table ->string('fullname')->nullable();
            $table->string('relationship')->nullable();
            $table->string('job')->nullable();
            $table->string('job_location')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('assign_students');
    }
}
