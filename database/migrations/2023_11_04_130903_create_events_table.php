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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short')->nullable();
            $table->integer('category')->nullable();
            $table->string('image')->nullable();
            $table->text('files')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_website')->nullable();
            $table->string('link_other')->nullable();
            $table->string('link_tickets')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('share_enable')->default(false);
            $table->integer('rvsp_needed')->nullable();
            $table->integer('tickets_needed')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
