<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('game_id');
            $table->string('receipt_number')->nullable();
            $table->string('receipt_image_path')->nullable();
            $table->string('name');
            $table->bigInteger('age')->min(18)->nullable();
            $table->string('email');
            $table->string('city')->nullable();
            $table->string('phone_number');
            $table->boolean('authenticated')->default(0);
            $table->boolean('accept_giveaway_rules');
            $table->boolean('accept_gdpr');
            $table->boolean('sign_up_for_newsletter');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_applicants');
    }
};
