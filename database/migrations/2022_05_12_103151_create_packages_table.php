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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('package_title_en');
            $table->string('package_title_ar');
            $table->string('package_duration');
            $table->string('package_amount');
            $table->string('package_group_size')->nullable();
            $table->string('package_tour_guide')->nullable();
            $table->string('package_rating')->nullable();
            $table->longText('package_image');
            $table->longText('package_tour_gallery')->nullable();
            $table->longText('information_details_en')->nullable();
            $table->longText('information_details_ar')->nullable();
            $table->longText('destination_en')->nullable();
            $table->longText('destination_ar')->nullable();
            $table->longText('depature_en')->nullable();
            $table->longText('depature_ar')->nullable();
            $table->longText('departure_time')->nullable();
            $table->longText('return_time')->nullable();
            $table->longText('included_en')->nullable();
            $table->longText('included_ar')->nullable();
            $table->longText('excluded_en')->nullable();
            $table->longText('excluded_ar')->nullable();
            $table->longText('travel_with_en')->nullable();
            $table->longText('travel_with_ar')->nullable();
            $table->longText('package_travel_plan_detials_en')->nullable();
            $table->longText('package_travel_plan_detials_ar')->nullable();
            $table->longText('package_location_link')->nullable();
            $table->boolean('package_holiday_offer')->default(0)->nullable();
            $table->boolean('status')->default(1)->nullable();
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
        Schema::dropIfExists('packages');
    }
};
