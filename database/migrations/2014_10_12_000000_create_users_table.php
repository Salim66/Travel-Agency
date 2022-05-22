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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();
            $table->integer('type')->nullable();
            $table->integer('category')->nullable();
            $table->integer('tag')->nullable();
            $table->integer('country')->nullable();
            $table->integer('packages')->nullable();
            $table->integer('post')->nullable();
            $table->integer('destination')->nullable();
            $table->integer('travel_gallery')->nullable();
            $table->integer('tour_guide')->nullable();
            $table->integer('reviewer')->nullable();
            $table->integer('users')->nullable();
            $table->integer('settings')->nullable();
            $table->integer('contact_us')->nullable();
            $table->integer('booking_package')->nullable();
            $table->integer('subscriber')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
