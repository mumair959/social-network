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
        Schema::create('report_posts', function (Blueprint $table) {
            $table->id();
            $table->string('report_issue',1000);
            $table->enum('status', ['Pending', 'Review', 'Approved', 'Rejected'])->default('Pending');
            $table->foreignId('reported_by')->constrained('users');
            $table->foreignId('post_id')->constrained();
            $table->string('report_result',1000)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_posts');
    }
};
