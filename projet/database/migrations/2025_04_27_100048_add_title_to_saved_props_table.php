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
    Schema::table('saved_props', function (Blueprint $table) {
        $table->string('title')->nullable();  // Ajoute la colonne 'title'
    });
}

public function down()
{
    Schema::table('saved_props', function (Blueprint $table) {
        $table->dropColumn('title');  // Supprime la colonne 'title' si la migration est annulée
    });
}

};
