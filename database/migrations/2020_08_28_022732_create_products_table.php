<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->string("name");
            //$table->integer("content")->nullable();
            //$table->string("unit_of_measure")->nullable();
            $table->string("bar_code")->nullable();
            $table->string("brand")->nullable();
            //Casa Pineiro
            $table->double("cp_price")->nullable();
            $table->integer("cp_qty")->nullable();
            $table->double("cp_offer_price")->nullable();
            $table->integer("cp_offer_duration")->nullable();
            // Tendejón Evelyn
            $table->double("te_price")->nullable();
            $table->integer("te_qty")->nullable();
            $table->double("te_offer_price")->nullable();
            $table->integer("te_offer_duration")->nullable();
            
            $table->text("description")->nullable();
            $table->string("delivery_option")->nullable();
            $table->double("delivery_cost")->nullable();
            $table->string("picture_1")->nullable();
            $table->string("picture_2")->nullable();
            $table->string("picture_3")->nullable();
            $table->boolean("show_price")->nullable()->default(false);
            $table->boolean("show_offer")->nullable()->default(false);
            $table->boolean("show_new")->nullable()->default(false);
            $table->integer("new_duration")->nullable();
            $table->boolean("show_product")->nullable()->default(false);
            $table->string("location")->nullable();
            $table->string("new_qty")->nullable();
            $table->boolean("editing")->default(false);
            $table->date("updated_date")->nullable();
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('products');
    }
}
