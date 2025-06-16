            <!-- Card  -->
            @forelse($agentStock as $agent_mobile)
            <div class="mobile-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="relative">
                    <img src="{{$agent_mobile->mobile->primaryImage->url}}" alt="{{$agent_mobile->mobile->name}}" class="w-full h-48 object-cover">
                    <span class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">NEW</span>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800">{{$agent_mobile->mobile->name}}</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Verified</span>
                    </div>
                    <p class="text-gray-600 mt-2 text-sm">{{$agent_mobile->mobile->fast_review}}</p>
                    <div class="mt-4 flex items-center">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Seller">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">{{$agent_mobile->agent->name}}</p>
                            <p class="text-xs text-gray-500">4.8 ★ (36 reviews)</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex gap-3">
                            <span class="text-2xl font-bold text-gray-900">${{$agent_mobile->price}}</span>
                            <form action="{{route('cart.store',$agent_mobile->id)}}" method="POST">
                                @csrf
                                <button type='submit' class="add-to-cart bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition" data-id="1" data-name="iPhone 13 Pro" data-price="899">
                                    Add to Cart
                                </button>
                            </form>
                            <a href="{{route('mobil_details',$agent_mobile->mobile_id)}}">
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition"> Details </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div id="no-results">No products found</div>
            @endforelse