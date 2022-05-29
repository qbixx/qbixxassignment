<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('client_items', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->enum('type', ['Wisdom', 'Philosophy', 'Design']);

            $table->json('title');
            $table->json('paragraph');

            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('client_items');
    }
};
