<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_sites', function (Blueprint $table) {
            $table->id();
            $table->string('firstdesc')->nullable();
            $table->string('first_title')->nullable();
            $table->string('sec_desc')->nullable();
            $table->string('sec_title')->nullable();
            $table->string('thi_desc')->nullable();
            $table->string('bace_image')->nullable();
            $table->string('sec_image')->nullable();
            $table->string('thi_image')->nullable();

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
        Schema::dropIfExists('web_sites');
    }
}
