<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('disgnation_id');
            $table->string('joining_date');
            $table->string('father_name');
            $table->string('tazkira_no');
            $table->date('dob'); 
            $table->string('birth_place');
            $table->string('education_level');
            $table->double('salary');
            $table->string('faculty')->nullable();
            $table->string('field')->nullable();
            $table->integer('exp_year')->nullable();
            $table->string('organization')->nullable();
            $table->string('position_title')->nullable();
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
        Schema::dropIfExists('assign_employees');
    }
}
