.<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->references("id")->on("users");   
            $table->foreignId("sale_id")->references("id")->on("sales");
            $table->unsignedBigInteger('product_id');
            $table->integer('cantidad');
            $table->string('size');
            $table->decimal('price');
            $table->float("final_price");
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold_products');
    }
}
