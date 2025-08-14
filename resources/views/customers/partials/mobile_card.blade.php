            @foreach($newMobiles as $mobile)
            <div class="device-card bg-white rounded-xl overflow-hidden shadow-md flex flex-col justify-between">

                <div class="relative h-48 bg-gray-200">
                    <img img src="{{$mobile->primaryImage?->url}}" alt="{{$mobile->name}}" class="w-full h-full object-cover">
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-800">{{$mobile->name}}</h3>
                        <span class="text-lg font-semibold text-blue-600"></span> <!--price-->
                    </div>
                    <p class="text-gray-600 mb-3">Company: <span class="font-medium">{{$mobile->brand->name}} </span></p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-blue -100 text-blue-800 text-xs rounded-full">{{$mobile->operatingSystem->name}}</span>
                        <span class="px-2 py-1 status-new text-white text-xs rounded-full">{{$mobile->specification->cpu}}</span>
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">{{$mobile->specification->ram}}</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{$mobile->specification->gpu}}</span>
                    </div>

                    <p class="text-gray-700 mb-4"></p>
                    <a href="{{ route('mobil_details', $mobile->id) }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition flex items-center justify-center">
                        <i class="fas fa-cart-plus mr-2"></i> More details
                    </a>

                </div>
            </div>
            @endforeach