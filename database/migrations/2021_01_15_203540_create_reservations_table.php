<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 12);
            $table->string('tel', 11);
            $table->string('mail', 100)->nullable();
            $table->date('date');
            $table->char('time', 5);
            $table->tinyInteger('ppl')->unsigned();
            $table->tinyInteger('course_id')->unsigned();
            $table->tinyInteger('tbl_id')->unsigned();
            $table->string('comment', 200)->nullable();
            $table->string('memo', 200)->nullable();
            $table->timestamps();

            $table->foreign('tbl_id')->references('id')->on('tables');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
