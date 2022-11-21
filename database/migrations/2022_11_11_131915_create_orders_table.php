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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('stocker_id');
            $table->date('order_date');
            $table->integer('amount');
            $table->string('status')->default('ordered');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('job_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('stocker_id')->references('id')->on('warehouses')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
};
