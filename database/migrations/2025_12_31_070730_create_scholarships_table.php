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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->softDeletes(); // Adds deleted_at column
            $table->timestamps();
            $table->string('name', 200);
            $table->string('location', 200);
            $table->string('provider', 200);
            $table->string('amount', 200);
            $table->date('deadline');
            $table->string('requirements', 255);
            $table->string('contact_details', 200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
