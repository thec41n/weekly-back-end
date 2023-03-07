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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('blog_content');
            /**
             * Karena author punya foreign key dengan table users
             * gunakan $table->unsignedBigInteger('user_id');
             * refrensi https://laravel.com/docs/9.x/migrations#foreign-key-constraints
             */
            $table->unsignedBigInteger('author');
            $table->timestamps();
            $table->softDeletes();
            
            // Refrensinya kemana gunakan $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
