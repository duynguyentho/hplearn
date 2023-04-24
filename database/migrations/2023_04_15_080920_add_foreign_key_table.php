<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('programs', function (Blueprint $table) {
//            $table->foreign('lesson_id')->on('lessons')->references('id');
//        });

//        Schema::table('lessons', function (Blueprint $table) {
//            $table->foreign('lesson_id')->on('lessons')->references('id');
//        });

//        Schema::table('course_teacher', function (Blueprint $table) {
//            $table->foreign('course_id')->on('courses')->references('id');
//            $table->foreign('user_id')->on('users')->references('id');
//        });

//        Schema::table('course_user', function (Blueprint $table) {
//            $table->foreign('course_id')->on('courses')->references('id');
//            $table->foreign('user_id')->on('users')->references('id');
//        });

//        Schema::table('lesson_user', function (Blueprint $table) {
//            $table->foreign('lesson_id')->on('lessons')->references('id');
//            $table->foreign('user_id')->on('users')->references('id');
//        });

        Schema::table('program_user', function (Blueprint $table) {
            $table->foreign('program_id')->on('programs')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('course_id')->on('courses')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
        });

        Schema::table('course_tag', function (Blueprint $table) {
            $table->foreign('course_id')->on('courses')->references('id');
            $table->foreign('tag_id')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
