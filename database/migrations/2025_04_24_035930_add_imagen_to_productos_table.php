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
        Schema::table('productos', function (Blueprint $table) {
            $table->binary('imagen')->nullable()->after('categoria_id'); // o longBlob si quieres más tamaño
            $table->dropColumn('url_imagen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('url_imagen')->after('categoria_id');
            $table->dropColumn('imagen');
        });
    }
};
