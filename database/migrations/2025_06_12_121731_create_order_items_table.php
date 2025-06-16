
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');

            // المنتج الذي تم طلبه (من جدول agent_mobile_stocks)
            $table->foreignId('product_id')->constrained('agent_mobile_stocks')->onDelete('cascade');

            $table->decimal('price', 10, 2); // السعر الفردي
            $table->integer('quantity')->default(1);
            $table->decimal('subtotal', 10, 2); // subtotal = price * quantity

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
