<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_theloai')->nullable();
            $table->foreign('id_theloai')->references('id')->on('the_loai')->onDelete('set null');
            $table->string('Ten',255);
            $table->string('TenKhongDau',255);
            $table->string('TenTheLoai',255)->default('Chưa được phân loai');
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
        Schema::dropIfExists('sach');
    }
}
