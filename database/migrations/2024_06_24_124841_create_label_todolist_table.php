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
        Schema::create('label_todolist', function (Blueprint $table) {
            
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');

            $table->unsignedBigInteger('todolist_id');
            $table->foreign('todolist_id')->references('id')->on('todolists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_todolist');
    }
};
