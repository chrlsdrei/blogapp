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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Use the standard `id` as the primary key
            $table->text('comment'); // Comment content field

            // Foreign key for the post
            $table->foreignId('post_id')
                  ->constrained('posts')
                  ->onDelete('cascade'); // If a post is deleted, its comments are deleted

            // Foreign key for the user who made the comment
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // If a user is deleted, their comments are deleted

            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
