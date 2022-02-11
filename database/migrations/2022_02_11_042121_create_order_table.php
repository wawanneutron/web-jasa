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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->index('fk_order_to_service');
            $table->foreignId('freelancer_id')->nullable()->index('fk_order_freelancer_to_users');
            $table->foreignId('buyer_id')->nullable()->index('fk_order_buyer_to_users');
            $table->foreignId('order_status_id')->nullable()->index('fk_order_to_order_status');

            $table->text('file')->nullable()->nullable();
            $table->longText('note')->nullable()->nullable();
            $table->date('expired')->nullable();

            $table->foreign('service_id', 'fk_order_to_service')
                ->references('id')->on('service')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('freelancer_id', 'fk_order_freelancer_to_users')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('buyer_id', 'fk_order_buyer_to_users')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('order_status_id', 'fk_order_to_order_status')
                ->references('id')->on('order_status')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('order');
    }
};
