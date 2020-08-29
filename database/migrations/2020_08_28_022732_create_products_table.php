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
            $table->string("bar_code")->nullable();
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("brand")->nullable();
            $table->integer("qty")->nullable();
            $table->integer("measure")->nullable();
            $table->string("unit_of_measure")->nullable();
            $table->integer("category_id")->nullable();
            $table->date("updated_date")->nullable();
            $table->integer("updated_by")->nullable();
            $table->string("picture_1")->nullable();
            $table->string("picture_2")->nullable();
            $table->string("picture_3")->nullable();
            $table->double("price")->nullable();
            $table->double("offer_price")->nullable();
            $table->integer("offer_duration")->nullable();
            $table->boolean("show_offer")->nullable()->default(false);
            $table->boolean("show_new")->nullable()->default(false);
            $table->integer("new_duration")->nullable();
            $table->boolean("show_product")->nullable()->default(false);
            $table->string("delivery_option")->nullable();
            $table->double("delivery_cost")->nullable();
            $table->string("location")->nullable();
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
