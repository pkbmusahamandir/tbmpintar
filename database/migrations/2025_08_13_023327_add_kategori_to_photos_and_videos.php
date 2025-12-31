<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->string('category')->nullable()->after('judul');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->string('category')->nullable()->after('youtube_code');
        });
    }

    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('category');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
