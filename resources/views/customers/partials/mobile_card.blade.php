          @foreach($newMobiles as $mobile)
            <!-- Phone Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden phone-card transition duration-300">
                <div class="relative">
                    <img src="{{$mobile->primaryImage?->url}}" alt="{{$mobile->name}}" class="w-full h-48 object-contain">
                    <button class="absolute top-3 right-3 text-red-500 favorite-btn transition duration-200">
                        <i class="far fa-heart text-xl"></i>
                    </button>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{$mobile->name}}</h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(128 reviews)</span>
                    </div>
                    <p class="text-gray-600 mb-4">{{$mobile->fast_review}}</p>
                    <div class="flex justify-between items-center">
                        <div class="space-x-2">
                            <a href="{{route('mobil_details',$mobile->id)}}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach