<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


//DZ-14
// id BIGINT UNSIGNED AUTO_INCREMENT
// title CHAR 200 NOT NULL
// description VARCHAR (100) NOT NULL
// body TEXT NOT NULL
// created_at TIMESTAMP
// updated_at TIMESTAMP


    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 200);
            $table->string('description', 100);
            $table->text('body');
            $table->timestamps();
        });

        Schema::table('posts', function ($table) {
            $table->boolean('status')->after('body')->nullable()->default(0);
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
}
