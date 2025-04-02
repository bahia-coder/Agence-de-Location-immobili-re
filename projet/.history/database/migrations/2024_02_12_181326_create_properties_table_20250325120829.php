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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('price')->default('');
            $table->string('image')->default('');
            $table->string('beds')->default('');
            $table->string('baths')->default('');
            $table->string('sq_ft')->default('');
            $table->string('year_built')->default('');
            $table->string('price_sqft')->default('');
            $table->text('more_info')->nullable();
            $table->string('location')->default('');
            $table->string('agent_name')->default('');
            $table->string('type')->default('');
            $table->timestamps();

            // Correction : Ajout de la clé étrangère home_type_id
            $table->unsignedBigInteger('home_type_id');
            $table->foreign('home_type_id')->references('id')->on('home_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
