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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
                $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email',191)->unique()->nullable();
            $table->string('phone',191)->unique()->nullable();
            $table->foreignId('province_id')->constrained()->onDelete('cascade'); // La province
            $table->string('country_residence')->nullable();
            $table->string('city_district')->nullable();
            $table->string('address')->nullable();
            $table->text('motivation')->nullable();
            $table->string('preferred_language')->nullable();

    $table->boolean('is_testimonial')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individuals');
    }
};
