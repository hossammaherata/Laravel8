<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllNotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_nots', function (Blueprint $table) {
            $table->id();
            $table->string('body')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();

            $table->unsignedBigInteger('user_id')->onDelete('null');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('all_nots');
    }
}
