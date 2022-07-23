<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFinanceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_finance_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->nullable;
            $table->integer('student_id')->nullable;
            $table->integer('assgin_student_id')->nullable;
            $table->integer('fee_catagory_id')->nullable;
            $table->string('date')->nullable;
            $table->double('amount')->nullable;
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
        Schema::dropIfExists('student_finance_fees');
    }
}
