<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaundryPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('unit_type');
            $table->BigInteger('laundry_type_id')->nullable()->unsigned();
            $table->integer('price');
            $table->BigInteger('user_id')->nullable()->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('laundry_prices');
    }
}
