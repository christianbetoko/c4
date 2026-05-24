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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
             $table->string('logo')->nullable();
            $table->string('letter')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('organization_owner')->nullable();
            $table->string('organization_email',191)->unique()->nullable();
            $table->string('organization_phone',191)->unique()->nullable();
            $table->string('organization_province')->nullable();
            $table->text('organization_motivation')->nullable();
            $table->boolean('is_valid')->default(false);
            $table->boolean('is_testimonial')->default(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
