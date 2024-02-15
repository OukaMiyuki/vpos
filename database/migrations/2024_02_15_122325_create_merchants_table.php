<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tenant')->unique();
            $table->bigInteger('id_marketing');
            $table->bigInteger('inv_code');
            $table->string('nama_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('status_ami')->nullable();
            $table->text('deskripsi_usaha')->nullable();
            $table->string('logo')->nullable();
            $table->string('desc_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
