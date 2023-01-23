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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->enum('is_male',['0','1']);
            $table->string('first_name');
            $table->string('city');
            $table->string('country');
            $table->date('birth_date');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('city_id');
            // $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            // $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('customer');
    }
};
