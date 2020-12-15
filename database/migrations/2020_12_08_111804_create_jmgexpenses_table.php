<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJmgexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jmgexpenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('amount');
            $table->string('receipt_voucher_number');
            $table->timestamp('date');
            $table->string('sponsor_name_English');
            $table->string('sponsor_name_Arabic');
            $table->string('name_English');
            $table->string('name_Arabic');
            $table->string('service_name_English');
            $table->string('photo');
            $table->string('images');
            $table->string('service_name_Arabic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jmgexpenses');
    }
}
