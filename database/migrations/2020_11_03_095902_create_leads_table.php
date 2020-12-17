<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('type');
            $table->integer('age')->nullable();
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('vin')->nullable();
            $table->string('hear')->nullable();
            $table->string('emirate')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('showroom')->nullable();
            $table->string('location')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('service_type')->nullable();
            $table->string('service_date')->nullable();
            $table->string('branch')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('leads');
    }
}
