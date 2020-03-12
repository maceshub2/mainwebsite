<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealOnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_on_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('deal_id');
            $table->bigInteger('product_id');
            $table->integer('status')->default(1);
            $table->integer('price_type')->default(0);
            $table->float('price')->dafault(0);
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
        Schema::dropIfExists('deal_on_products');
    }
}
