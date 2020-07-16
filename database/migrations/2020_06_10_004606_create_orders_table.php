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
            $table->boolean('editable')->default(true);
            $table->boolean('delivered')->default(false);
            $table->string('payment_type')->default('cash');
            $table->double('total_price');
            $table->double('total');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('delivery_man_id')->nullable()->references('id')->on('delivery_men');
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
        Schema::dropIfExists('orders');
    }
}
