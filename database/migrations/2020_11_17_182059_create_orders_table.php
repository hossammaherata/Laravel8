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
            $table->string('name');
            $table->integer('count');
            $table->integer('profit');
            $table->integer('realprice');
            $table->integer('payprice');
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->softDeletes();
            $table->enum('status', ['wait', 'success','cancel','return'])->default('wait');
            $table->integer('discount')->default(0)->nullable();
            $table->integer('profitadmin')->default(0);
            $table->string('note')->nullable();
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
