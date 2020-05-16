<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questiondetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_details', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->text("question_text");
            $table->text("a")->nullable();
            $table->text("b")->nullable();
            $table->text("c")->nullable();
            $table->text("d")->nullable();
            $table->boolean("multiplechoice")->default(true);
            $table->text("code")->nullable();
            $table->text("answer")->nullable();
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
        Schema::dropIfExists("question_details");
    }
}
