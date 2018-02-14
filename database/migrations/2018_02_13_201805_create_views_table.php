<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->unsignedInteger('user_agent_id');
            $table->unsignedInteger('ip_id');
            $table->unsignedInteger('count')->default(1);
            $table->dateTime('date');

            $table->foreign('page_id')->references('id')
                ->on('pages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_agent_id')->references('id')
                ->on('user_agents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ip_id')->references('id')
                ->on('ips')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
