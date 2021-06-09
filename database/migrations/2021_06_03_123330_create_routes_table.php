<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('routes');
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('source_id')->unsigned()->index()->nullable();
            $table->bigInteger('destination_id')->unsigned()->index()->nullable();
            $table->foreign('source_id')->references('id')->on('terminals')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('terminals')->onDelete('cascade');
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
        Schema::dropIfExists('routes');
    }
}
