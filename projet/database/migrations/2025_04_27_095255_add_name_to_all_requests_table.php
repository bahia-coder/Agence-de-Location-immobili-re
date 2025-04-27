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
        $table->string('name')->nullable();  // Ajoute la colonne 'name'
    });
}

public function down()
{
    Schema::table('all_requests', function (Blueprint $table) {
        $table->dropColumn('name');  // Supprime la colonne 'name' si la migration est annulée
    });
}

};
