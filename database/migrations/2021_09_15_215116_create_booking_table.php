<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('track_code');
            $table->string('re_name')->nullable();
            $table->string('re_phone')->nullable();
            $table->string('re_email')->nullable();
            $table->string('re_address')->nullable();
            $table->string('size')->nullable();
            $table->dateTime('date')->nullable();
            $table->datetime('paid_at')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->foreignId('customer_id')->constrained('customer')->onDelete('cascade');
            $table->foreignId('bookingstatus_id')->constrained('booking_statuses')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('service')->onDelete('cascade');
            $table->foreignId('delivery_id')->constrained('delivery_type')->onDelete('cascade');
            $table->foreignId('notification_id')->constrained('notification')->onDelete('cascade');
            $table->foreignId('package_id')->constrained('package_type')->onDelete('cascade');
            $table->foreignId('trackStatus_id')->nullable()->constrained('tracking_statuses')->onDelete('cascade');

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
        Schema::dropIfExists('booking');
    }
}
