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
            $table->foreign('outlet_id')->references('id')->on('outlets');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('courier_id')->references('id')->on('users');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('laundry_prices', function (Blueprint $table) {
            $table->foreign('laundry_type_id')->references('id')->on('laundry_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign('courier_id')->references('id')->on('users');
            $table->foreign('customer_id')->reference('id')->on('customers');
            $table->foreign('outlet_id')->reference('id')->on('outlets');
        });
        Schema::table('detail_transactions', function (Blueprint $table) {
            $table->foreign('laundry_price_id')->references('id')->on('laundry_prices');
            $table->foreign('laundry_type_id')->references('id')->on('laundry_types');
            $table->foreign('transaction_id')->references('id')->on('transactions');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
        });
        Schema::table('users', function (Blueprint $table) {
            
        });
        Schema::dropIfExists('relation');
    }
}
