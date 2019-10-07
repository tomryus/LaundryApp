<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('transaction_id')->nullable()->unsigned();
            $table->BigInteger('laundry_price_id')->nullable()->unsigned();
            $table->BigInteger('laundry_type_id')->nullable()->unsigned();
            $table->integer('qty');
            $table->integer('price');
            $table->integer('subtotal');
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
        Schema::dropIfExists('detail_transactions');
    }
}
