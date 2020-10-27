<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogpostviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogpostviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('blog_id')->nullable();
            $table->ipAddress('user_ip')->nullable();
            $table->string('viewcount')->default(1)->nullable();
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
        Schema::dropIfExists('blogpostviews');
    }
}
