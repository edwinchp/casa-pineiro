<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToProductsTable extends Migration
{
    /**
     * Status example:
     * I: Inactive, product will not be used anymore, no longer listed in products
     * A: Active, default value, product is listed with the others
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('status')->default('A')->after('picture_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
