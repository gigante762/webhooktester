<div>
    <h1 class="text-lg">{{$app->name}}</h1>
    <hr class="py-2">

    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        @foreach ($this->locations as $location)
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <!-- Red and Green Buttons -->
                <div class="absolute top-2 right-2 flex space-x-2 cursor-pointer">
                    <div class="w-3 h-3 bg-red-500 rounded-full cursor-pointer"></div>
                    <div class="w-3 h-3 bg-green-500 rounded-full cursor-pointer"></div>
                </div>
            
                <!-- SVG Pattern -->
                @if ($location->emergencyType?->img)
                    <img src="{{ $location->emergencyType->img }}" alt="Emergency Type Image" class="absolute inset-0 w-full h-full object-cover">
                @else
                <svg class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" fill="none">
                    <defs>
                        <pattern id="pattern-6827711a3f39a" x="0" y="0" width="8" height="8" patternUnits="userSpaceOnUse">
                            <path d="M-1 5L5 -1M3 9L8.5 3.5" stroke-width="0.5"></path>
                        </pattern>
                    </defs>
                    <rect stroke="none" fill="url(#pattern-6827711a3f39a)" width="100%" height="100%"></rect>
                </svg>
                    @endif

               
            
                <!-- Channel Name Label -->
                <div class="selection-none absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-black text-white text-sm px-2 py-1 rounded">
                    {{$location->emergencyType?->name ?? 'none'  }}
                </div>
            </div>
        @endforeach
      
    <div class="py-2 mb-5"></div>
</div>
