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
            $table->string('type')->nullable()->default('events_app');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->references('id')->on('events_categories');
            $table->string('image')->nullable();
            $table->string('where')->nullable();
            $table->string('google_id')->nullable();
            $table->text('files')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_website')->nullable();
            $table->string('link_other')->nullable();
            $table->string('link_tickets')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('share_enable')->default(false);
            $table->boolean('rvsp_needed')->nullable();
            $table->boolean('tickets_needed')->nullable();
            $table->boolean('comments_enable')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('starts')->nullable();
            $table->dateTime('ends')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id')->default(true);
            $table->foreign('user_id')->references('id')->on('users');
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
