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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->string('code')->nullable();
            $table->string('cost')->nullable();
            $table->string('price')->nullable();
            $table->string('st_price')->nullable();
            $table->string('brand')->nullable();
            $table->string('volume')->nullable();
            $table->string('design')->nullable();
            $table->string('stuff')->nullable();
            $table->string('season')->nullable();
            $table->unsignedBigInteger('vendor')->nullable();
            $table->enum('status', ['draft','publish','pending'])->default('draft');
            $table->timestamps();
            $table->foreign('vendor')->references('id')->on('vendors');
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
