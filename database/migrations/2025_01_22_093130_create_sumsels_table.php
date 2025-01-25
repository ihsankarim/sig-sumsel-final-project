<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sumsel', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false); // Nama kabupaten/kota
            $table->string('alt_name')->default(''); // Nama alternatif
            $table->double('latitude')->default(0)->nullable(false); // Latitude
            $table->double('longitude')->default(0)->nullable(false); // Longitude
            $table->enum('type_polygon', ['Polygon', 'MultiPolygon'])->default('Polygon'); // Tipe polygon
            $table->longText('polygon')->nullable(false); // Data polygon
            $table->bigInteger('populasi')->default(0)->nullable(false); // Populasi
            $table->integer('jumlah_restoran')->nullable(); // Jumlah restoran
            $table->bigInteger('beragama_islam')->default(0); // Populasi beragama Islam
            $table->bigInteger('jumlah_kejahatan')->default(0); // Jumlah kejahatan
            $table->decimal('ekonomi', 15, 2)->default(0); // Ekonomi (GDP)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumsels');
    }
};
