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
        Schema::table('all_requests', function (Blueprint $table) {
       #     $table->string('agent_name')->nullable();  // Ajoute la colonne agent_name

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_requests', function (Blueprint $table) {
            $table->dropColumn('agent_name');  // Supprime la colonne agent_name
        });
    }
};
