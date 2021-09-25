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
            $table->foreignid('venue_id')->constrained('venues')->onDelete('cascade');
            $table->foreignid('timeslot_id')->constrained('timeslots')->onDelete('cascade');
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade');
            $table->string('bookingid');
            $table->string('firstname');
            $table->string('lastname');
            $table->longtext('address');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('bookingdate');
            $table->smallInteger('status')->default(0);
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
