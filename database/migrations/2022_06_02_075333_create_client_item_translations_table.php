<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_item_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->text('title')->nullable();
            $table->text('paragraph')->nullable();
            $table->unique(['client_item_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_item_translations');
    }
};
