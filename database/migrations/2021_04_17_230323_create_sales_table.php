<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('store_id');
            $table->string('name');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('customer_id')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('received')->nullable();
            $table->integer('change')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
