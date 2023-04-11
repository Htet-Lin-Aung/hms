<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id');
            $table->string('name');
            $table->Integer('nrc_region');
            $table->string('nrc_township');
            $table->string('nrc_type');
            $table->Integer('nrc_no');
            $table->string('other_nrc');
            $table->string('email')->nullable();
            $table->Integer('phone');
            $table->string('address');
            $table->string('revenue_source');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('payment_status')->default('pending');
            $table->string('status')->default('checkin');
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
        Schema::dropIfExists('customers');
    }
}
