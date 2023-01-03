<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('quantity');
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('transactionId');

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('transactionId')->references('id')->on('transaction_headers');

            $table->primary(['productId','transactionId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
};
