<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('courier_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('laundry_prices', function (Blueprint $table) {
            $table->foreign('laundry_type_id')->references('id')->on('laundry_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('courier_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('detail_transactions', function (Blueprint $table) {
            $table->foreign('laundry_price_id')->references('id')->on('laundry_prices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('laundry_type_id')->references('id')->on('laundry_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
