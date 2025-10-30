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
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->nullable()->after('title');
            }
            if (!Schema::hasColumn('posts', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('content');
            }
            if (!Schema::hasColumn('posts', 'featured_image')) {
                $table->string('featured_image')->nullable()->after('excerpt');
            }
            if (!Schema::hasColumn('posts', 'status')) {
                $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('featured_image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['slug', 'excerpt', 'featured_image', 'status']);
        });
    }
};
