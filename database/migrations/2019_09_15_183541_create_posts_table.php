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

        Schema::table('posts', function ($table) {
            $table->string('title', 255)->change();
            $table->string('description', 255)->nullable()->change();
        });

        Schema::table('posts', function ($table) {
            $table->string('slug',255)->after('title')->unique();
        });

        Schema::table('posts', function ($table) {
            $table->dropColumn('status');
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
