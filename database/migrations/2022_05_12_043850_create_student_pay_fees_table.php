<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPayFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_pay_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id')->comment('student_class_id');
            $table->integer('student_id')->comment('assign_student_id');
            $table->integer('registration_fee_id')->comment('registration_fee_amounts_id')->nullable();
            $table->integer('monthly_fee_id')->comment('fee_amounts_id');
            $table->integer('transport_id')->comment('transportations_id');
            $table->string('date')->nullable();
            $table->double('discount')->nullable();
            $table->double('payable')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('student_pay_fees');
    }
}
