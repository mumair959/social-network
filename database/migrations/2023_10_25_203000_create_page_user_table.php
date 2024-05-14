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
        Schema::create('page_user', function (Blueprint $table) {
            $table->foreignId('page_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['Active', 'Blocked'])->default('Active');
            $table->boolean('is_admin')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_user');
    }
};
