<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDecrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_decrements', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('employee_id=User_id');
            $table->integer('previous_salary')->nullable();
            $table->integer('present_salary')->nullable();
            $table->integer('decrement_salary')->nullable();
            $table->date('effected_salary')->nullable();
            $table->string('decrement_reason')->nullable();
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
        Schema::dropIfExists('employee_decrements');
    }
}
