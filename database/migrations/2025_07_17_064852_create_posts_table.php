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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Post Content
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable()->default('text');
            $table->longText('body');

            // Post Metadata
            $table->string('featured_image')->nullable(); // Path to an optional image
            $table->timestamp('published_at')->nullable(); // For drafts and scheduled posts

            // Foreign Key Relationship to 'users' table
            $table->foreignId('user_id')          // Creates the user_id column
                  ->constrained('users')          // Adds a foreign key constraint to the 'id' on the 'users' table
                  ->onDelete('cascade');          // If a user is deleted, all of their posts will be deleted too

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
