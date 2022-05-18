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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_slug');
            $table->string('number_of_place');
            $table->string('number_of_hotal');
            $table->string('rating')->nullable();
            $table->string('image');
            $table->string('destination_en')->nullable();
            $table->string('destination_ar')->nullable();
            $table->string('departure_en')->nullable();
            $table->string('departure_ar')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('return_time')->nullable();
            $table->longText('detials_en')->nullable();
            $table->longText('detials_ar')->nullable();
            $table->longText('destination_map_link')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('destinations');
    }
};
