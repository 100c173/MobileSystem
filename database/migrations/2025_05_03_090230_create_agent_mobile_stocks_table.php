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
        Schema::create('agent_mobile_stocks', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Agent user ID (linked via Spatie roles)

            $table->foreignId('mobile_id')->constrained()->onDelete('cascade'); // Mobile device ID

            $table->decimal('price', 10, 2);  // Selling price set by the agent
            $table->integer('quantity');      // Quantity of the mobile in agent's stock

            $table->timestamp('last_updated')->nullable(); // Last manual update to stock

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_mobile_stocks');
    }
};
