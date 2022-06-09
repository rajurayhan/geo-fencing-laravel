<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('lang', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->polygon('position')->nullable();

            // Add a Point spatial data field named location
            $table->point('location')->nullable();
            // Add a Polygon spatial data field named area
            $table->polygon('area')->nullable();

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
        Schema::dropIfExists('geo_data');
    }
}
