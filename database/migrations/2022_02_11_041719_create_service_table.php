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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->integer('revision_limit')->nullable();
            $table->integer('price')->nullable();
            $table->text('note')->nullable();

            $table->foreign('users_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('service');
    }
};
