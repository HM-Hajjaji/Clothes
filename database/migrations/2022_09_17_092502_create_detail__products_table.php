<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("stock");
            $table->integer('detail_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign("detail_id")->references("id")->on("details")->cascadeOnDelete();
            $table->foreign("product_id")->references("id")->on("products")->cascadeOnDelete();
            $table->decimal('price',8,2)->nullable();
            $table->decimal('discount',8,2)->nullable();
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
        Schema::dropIfExists('detail__products');
    }
}
