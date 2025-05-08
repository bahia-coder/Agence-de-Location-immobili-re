<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('all_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('all_requests', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('all_requests', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('all_requests', 'phone')) {
                $table->string('phone')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('all_requests', function (Blueprint $table) {
            if (Schema::hasColumn('all_requests', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('all_requests', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('all_requests', 'phone')) {
                $table->dropColumn('phone');
            }
        });
    }
};
