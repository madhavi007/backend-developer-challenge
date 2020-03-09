<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ap_states', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('state');
            $table->string('code');
            $table->string('nickname');
            $table->string('capital');
            $table->string('full_width_image')->nullable();
            $table->string('image_attribution')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('image_caption')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ap_states');
    }
}
