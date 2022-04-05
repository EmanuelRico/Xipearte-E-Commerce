<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->references("id")->on("users");
            $table->string("street");
            $table->string("number1");
            $table->string("number2")->nullable();
            $table->string("colony");
            $table->string("cp");
            $table->string("reference");
            $table->string("phone_number");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directions');
    }
}
