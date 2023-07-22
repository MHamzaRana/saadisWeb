<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('weight')->nullable();
            $table->string('name')->nullable();
            $table->string('phone');
            $table->string('secondary_phone')->nullable();
            $table->string('shipment_address');
            $table->unsignedBigInteger('user_id');
            $table->string('city');
            $table->string('country');
            $table->enum('type',['cod', 'pickup', 'online_paid'])->default('cod');
            $table->enum('status',['pending', 'processing', 'approved', 'packed',
            'delivered', 'completed', 'cancelled', 'rejected', 'spam', 'blocked'])->default('pending');
            $table->enum('courier', ['call_courier', 'rider_logistics', 'local'])->default('call_courier');
            $table->string('courier_status');
            $table->string('tracking')->nullable();
            $table->string('batch')->nullable();
            $table->string('price');
            $table->string('delivery_charges')->nullable();
            $table->string('tax')->nullable();
            $table->string('qty')->default('1');
            $table->enum('payment', ['pending', 'done', 'adjusted', 'gift'])->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
