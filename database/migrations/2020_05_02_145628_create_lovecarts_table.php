<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLovecartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lovecarts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->ipAddress('user_ip')->nullable();
            $table->bigInteger('product_quentity')->nullable()->default(1);
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
        Schema::dropIfExists('lovecarts');
    }
}
