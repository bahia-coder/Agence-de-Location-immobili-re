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
        Schema::create('all_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prop_id');
            $table->string('agent_name')->nullable(); // Ajoute la colonne 'agent_name'
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('all_requests');
    }
};
