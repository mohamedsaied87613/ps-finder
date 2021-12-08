<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_stations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            
            // should have default.
            $table->text('image_path')->nullable();
            
            $table->text('full_address')->unique();
            $table->text('description')->nullable();
            $table->text('offer')->nullable();
            $table->unsignedInteger('hour_price');
            
            $table->string('open_at')->nullable();
            $table->string('closed_at')->nullable();
            
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('zone_id');

            $table->foreign('user_id')->
                    references('id')->
                    on('users')->
                    onDelete('cascade');
            $table->foreign('zone_id')->
                    references('id')->
                    on('zones')->
                    onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('play_stations');
    }
}
