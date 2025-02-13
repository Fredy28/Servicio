<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('profesores', function (Blueprint $table) {
            $table->string('drive')->nullable(); // Agrega la columna 'drive'
        });
    }

    public function down()
    {
        Schema::table('profesores', function (Blueprint $table) {
            $table->dropColumn('drive'); // Elimina la columna si se revierte la migración
        });
    }
};
