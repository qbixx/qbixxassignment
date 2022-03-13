<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('items', function (Blueprint $table) {
      $table->id();
      $table->foreignId('client_id')->constrained()
          ->onDelete('cascade');
      $table->string('title_en');
      $table->string('title_nl');
      $table->string('title_fr');
      $table->text('description_en');
      $table->text('description_nl');
      $table->text('description_fr');
      $table->enum('type_en', ['Wisdom', 'Philosophy', 'Design']);
      $table->enum('type_nl', ['Wijsheid', 'Filosofie', 'Ontwerp']);
      $table->enum('type_fr', ['Sagesse', 'Philosophie', 'Conception']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('items');
  }
};
