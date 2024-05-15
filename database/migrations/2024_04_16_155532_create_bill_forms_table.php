<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->integer('cupon_code');
            $table->string('order_notes');
            $table->string('country')->default('Egypt');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('bill_forms');
    }
}
