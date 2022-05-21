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
        Schema::create('subscrip_sections', function (Blueprint $table) {
            $table->id();
            $table->string('awesome_tour');
            $table->string('new_destination');
            $table->string('years_experiance');
            $table->string('best_mountains');
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
        Schema::dropIfExists('subscrip_sections');
    }
};
