<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_offices', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('email')->nullable();
            $table->string('type');
            $table->string('manager')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();
            $table->string('open_days')->nullable();
            $table->string('thursday')->nullable();
            $table->text('friday')->nullable();
            $table->text('map')->nullable();
            $table->bigInteger('branch_id')->unsigned();
            $table->integer('user_id');
            $table->integer('status')->default(0);
            $table->integer('order')->default(0);

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

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
        Schema::dropIfExists('branch_offices');
    }
}
