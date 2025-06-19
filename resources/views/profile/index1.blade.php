<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بروفايل المستخدم - متجر موبايلات</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap');

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f7fa;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .rtl {
            direction: rtl;
        }
    </style>
</head>
<body class="rtl">
    <div class="min-h-screen pb-16">
        <!-- Header -->
        <div class="gradient-bg text-white px-4 py-6 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <button class="text-white">
                        <i class="fas fa-arrow-right text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold">الملف الشخصي</h1>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <button class="text-white">
                        <i class="fas fa-bell text-xl"></i>
                    </button>
                    <button class="text-white">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="container mx-auto px-4 -mt-12">
            <div class="bg-white rounded-xl shadow-md overflow-hidden relative">
                <div class="gradient-bg h-24"></div>
                <div class="flex flex-col items-center px-6 pb-6 relative">
                    <div class="h-24 w-24 rounded-full border-4 border-white -mt-12 bg-white overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="صورة المستخدم" class="h-full w-full object-cover">
                    </div>
                    <div class="mt-4 text-center">
                        <h2 class="text-xl font-bold text-gray-800">أحمد محمد</h2>
                        <p class="text-gray-600">عضو منذ: يناير 2023</p>
                    </div>
                    <div class="flex justify-center space-x-4 space-x-reverse mt-4">
                        <button class="gradient-bg text-white px-6 py-2 rounded-full font-medium shadow-md hover:shadow-lg transition">
                            تعديل الملف
                        </button>
                        <button class="border border-blue-500 text-blue-500 px-6 py-2 rounded-full font-medium hover:bg-blue-50 transition">
                            مشاركة
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="container mx-auto px-4 mt-6">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white rounded-xl p-4 text-center shadow-sm hover:shadow-md transition card-hover">
                    <div class="gradient-text text-2xl font-bold">24</div>
                    <div class="text-gray-600 text-sm">المنتجات</div>
                </div>
                <div class="bg-white rounded-xl p-4 text-center shadow-sm hover:shadow-md transition card-hover">
                    <div class="gradient-text text-2xl font-bold">156</div>
                    <div class="text-gray-600 text-sm">المتابعون</div>
                </div>
                <div class="bg-white rounded-xl p-4 text-center shadow-sm hover:shadow-md transition card-hover">
                    <div class="gradient-text text-2xl font-bold">89</div>
                    <div class="text-gray-600 text-sm">التقييمات</div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="container mx-auto px-4 mt-6">
            <div class="flex border-b border-gray-200">
                <button class="flex-1 py-3 px-4 text-center font-medium text-blue-500 border-b-2 border-blue-500">
                    <i class="fas fa-mobile-alt mr-2"></i> منتجاتي
                </button>
                <button class="flex-1 py-3 px-4 text-center font-medium text-gray-500 hover:text-blue-500">
                    <i class="fas fa-heart mr-2"></i> المفضلة
                </button>
                <button class="flex-1 py-3 px-4 text-center font-medium text-gray-500 hover:text-blue-500">
                    <i class="fas fa-comment-alt mr-2"></i> المراجعات
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="container mx-auto px-4 mt-4">
            <div class="grid grid-cols-2 gap-4">
                <!-- Product 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aXBob25lfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="iPhone" class="w-full h-40 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> 4.8
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-gray-800">آيفون 14 برو</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-blue-500 font-bold">3,499 ر.س</span>
                            <button class="text-purple-500">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1631729371254-42c2892f0e6e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2Ftc3VuZ3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Samsung" class="w-full h-40 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> 4.6
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-gray-800">سامسونج S23</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-blue-500 font-bold">2,899 ر.س</span>
                            <button class="text-purple-500">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1624561172888-ac93c696e10c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8eGlhb21pfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Xiaomi" class="w-full h-40 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> 4.2
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-gray-800">شاومي 12T</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-blue-500 font-bold">1,799 ر.س</span>
                            <button class="text-purple-500">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fG9wcG98ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Oppo" class="w-full h-40 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> 4.0
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-gray-800">أوبو رينو 8</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-blue-500 font-bold">1,499 ر.س</span>
                            <button class="text-purple-500">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Product Button -->
        <div class="fixed bottom-6 right-6 left-6">
            <button class="gradient-bg text-white w-full py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition flex items-center justify-center">
                <i class="fas fa-plus-circle text-xl mr-2"></i> إضافة منتج جديد
            </button>
        </div>
    </div>

    <script>
        // Simple animation for cards on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover');

            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });

            // Set initial state for animation
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.3s ease-out';
            });
        });
    </script>
</body>
</html>
