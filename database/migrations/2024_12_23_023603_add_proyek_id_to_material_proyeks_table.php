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
        Schema::table('material_proyek', function (Blueprint $table) {
            $table->unsignedBigInteger('proyek_id')->nullable()->after('harga_satuan'); // Menambahkan kolom proyek_id

            // Menambahkan foreign key constraint jika proyek_id merujuk ke tabel proyek
            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('material_proyek', function (Blueprint $table) {
            $table->dropForeign(['proyek_id']); // Menghapus foreign key constraint
            $table->dropColumn('proyek_id'); // Menghapus kolom proyek_id
        });
    }

};