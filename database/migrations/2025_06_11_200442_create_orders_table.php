<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // المستخدم (الزبون) الذي أنشأ الطلب
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // المبلغ الإجمالي
            $table->decimal('total_amount', 10, 2);

            // الحالة: قيد التنفيذ - مكتمل - ملغي - إلخ
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');

            // ID من Stripe لربط الدفع بالطلب
            $table->string('payment_intent_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
