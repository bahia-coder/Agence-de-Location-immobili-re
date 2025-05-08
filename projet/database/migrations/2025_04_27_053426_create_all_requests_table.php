<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('all_requests', function (Blueprint $table) {
            $table->id();
            $table->string('prop_id');
            $table->string('agent_name');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('all_requests');
    }
}
