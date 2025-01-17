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
        Schema::create('dethi', function (Blueprint $table) {
            $table->id();
            $table->string('tendethi');
            $table->integer('thoigianthi');
            $table->dateTime('thoigianbatdau');
            $table->dateTime('thoigianketthuc');
            $table->integer('soluongcauhoi');
            $table->integer('trangthai')->default(0);
            $table->unsignedBigInteger('monhoc_id'); 
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('monhoc_id')->references('id')->on('monhoc')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('dethi');
    }
};
