<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_histories', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->foreignId('trackingStatus_id')->constrained('tracking_statuses')->onDelete('cascade');
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('tracking_histories');
    }
}
