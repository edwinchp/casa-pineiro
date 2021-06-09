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
            $table->integer('store_id');
            $table->string("name");
            //$table->integer("content")->nullable();
            //$table->string("unit_of_measure")->nullable();
            $table->string("bar_code")->nullable();
            $table->string("brand")->nullable();
            //Casa Pineiro
            $table->double("price");
            $table->double("cost_price")->nullable();
            $table->integer("qty");
            $table->double("offer_price")->nullable();
            $table->timestamp("offer_ends")->nullable();

            $table->text("description")->nullable();
            $table->string("delivery_option")->nullable();
            $table->double("delivery_cost")->nullable();
            $table->string("picture")->nullable();
            $table->string("picture_link")->nullable();
            $table->boolean("show_price")->nullable()->default(false);
            $table->boolean("show_offer")->nullable()->default(false);
            $table->boolean("show_new")->nullable()->default(false);
            $table->integer("new_duration")->nullable();
            $table->boolean("show_product")->nullable()->default(false);
            $table->string("location")->nullable();
            $table->string("new_qty")->nullable();
            $table->boolean("editing")->default(false);
            $table->integer("updated_by")->nullable();
            $table->integer("created_by")->nullable();
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
