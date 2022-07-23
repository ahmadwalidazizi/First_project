<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationFeeAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_fee_amounts', function (Blueprint $table) {
            $table->id(); 
            $table->integer('fee_catagory_id');
            $table->integer('class_id');
            $table->double('registration_amount');
            $table->double('uniform');
            $table->double('qertasia');
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
        Schema::dropIfExists('registration_fee_amounts');
    }
}
