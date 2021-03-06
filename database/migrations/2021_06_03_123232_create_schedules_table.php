<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('schedules');
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamp("departure_time")->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));;
            $table->timestamp("arrival_time")->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));;
            $table->decimal("price");
            $table->bigInteger('bus_id')->unsigned()->index()->nullable();
            $table->bigInteger('destination_id')->unsigned()->index()->nullable();
            $table->bigInteger('source_id')->unsigned()->index()->nullable();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('terminals')->onDelete('cascade');
            $table->foreign('source_id')->references('id')->on('terminals')->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
}
