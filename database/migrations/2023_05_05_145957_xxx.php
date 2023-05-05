<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Xxx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_user', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
//            $table->foreign('course_id')->on('courses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_user', function (Blueprint $table) {
        });
    }
}
