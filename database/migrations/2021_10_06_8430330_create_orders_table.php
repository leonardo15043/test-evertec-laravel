<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_customer")->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers');

            $table->integer("id_order_state")->unsigned();
            $table->foreign('id_order_state')->references('id')->on('order_states');

            $table->integer("id_product")->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
            
            $table->decimal('payment', 10, 2);
            $table->date('expiration_date');
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
        Schema::dropIfExists('orders');
    }
}
