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
        Schema::create('advantage_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()
                ->index('fk_advantage_user_to_service');
            $table->string('advantage');

            $table->foreign('service_id', 'fk_advantage_user_to_service')
                ->references('id')->on('service')
                ->onUpdate('CASCADE')
                ->onUpdate('CASCADE');

            $table->softDeletes();
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
        Schema::dropIfExists('advantage_user');
    }
};
