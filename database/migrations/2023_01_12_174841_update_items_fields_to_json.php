<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table): void {
            $table->json('title')->change();
            $table->json('paragraph')->change();
            $table->json('type')->change();
            $table->dropColumn('language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table): void {
            $table->string('language', 20);
            $table->string('title', 50);
            $table->string('paragraph', 300);
            $table->string('type', 30);
        });
    }
};
