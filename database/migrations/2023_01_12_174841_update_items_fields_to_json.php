<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table): void {
            $table->json('title')->change();
            $table->json('paragraph')->change();
            $table->json('type')->change();
            $table->dropColumn('language');
        });
    }
};
