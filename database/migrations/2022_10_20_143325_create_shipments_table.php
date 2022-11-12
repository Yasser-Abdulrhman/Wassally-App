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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('shipment_number');
            $table->unsignedBigInteger('no_pieces')->nullabe();
            $table->unsignedBigInteger('weight')->nullable();
            $table->longText('description')->nullable();
            $table->enum("status",["pending","areaSender","onWay","areaReciever","complete"])->default("pending");
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reciever_id')->nullable();
            $table->foreign('reciever_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('specific_address');
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
        Schema::dropIfExists('shipments');
    }
};
