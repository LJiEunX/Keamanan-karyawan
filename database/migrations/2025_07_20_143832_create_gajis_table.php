<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('gajis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('karyawan_id');
        $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        $table->decimal('gaji_pokok', 12, 2);
        $table->decimal('tunjangan', 12, 2);
        $table->decimal('potongan', 12, 2);
        $table->text('total_gaji'); // akan dienkripsi
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
