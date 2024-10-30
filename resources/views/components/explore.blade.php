<!-- Search Section -->
<div>
    <div class="{{ $errorLoading ? '' : 'hidden' }} mt-4 p-4 bg-red-50 text-red-600 rounded-lg text-center">
        Unable to load city data. Please try again later.
    </div>
    <div class="mb-8 text-center">
        <input id="city" type="text"
            wire:model="city"
            placeholder="Search for a city..."
            class="w-full max-w-2xl mx-auto px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
        >
        <button id="searchbutton"  wire:click="find">Search</button>
    </div>
    <!-- Main Content Grid -->
    <div class="grid md:grid-cols-3 gap-8 mb-8">
        <!-- Weather Card -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-center">
                <h2 class="text-xl font-semibold mb-4">Current Weather</h2>
                <div class="text-5xl font-bold mb-4">{{$weather['main']['temp']}}°C</div>
                <p class="text-gray-600 mb-4">{{$weather['weather'][0]['description']}}<img src='https://openweathermap.org/img/wn/{{$weather['weather'][0]['icon']}}.png' alt=""></p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="font-semibold">Humidity</div>
                        <div class="text-gray-600">{{$weather['main']['humidity']}}%</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="font-semibold">Wind</div>
                        <div class="text-gray-600">{{$weather['wind']['speed']}} km/h</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map Container -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6 h-full min-h-[400px]">
                <div id="fullmap" class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">

                </div>
            </div>

            @script
            <script>
                document.getElementById('fullmap').innerHTML = '<div id="map" class="w-full h-full rounded-lg"></div>'
                maptilersdk.config.apiKey = 'BY2OGOzy0ZHXoLWJDZ1i';
                const map                 = new maptilersdk.Map({
                    container: 'map',
                    style    : maptilersdk.MapStyle.STREETS,
                    center   : [{{$lat}},{{$lon}} ], // starting position [lng, lat]
                    zoom     : 14 // starting zoom
                });

                Livewire.hook('morph.updated', ({ el, component }) => {
                    document.getElementById('fullmap').innerHTML = '<div id="map" class="w-full h-full rounded-lg"></div>'
                    maptilersdk.config.apiKey = 'BY2OGOzy0ZHXoLWJDZ1i';
                    const map                 = new maptilersdk.Map({
                        container: 'map',
                        style    : maptilersdk.MapStyle.STREETS,
                        center   : [{{$lat}},{{$lon}} ], // starting position [lng, lat]
                        zoom     : 14 // starting zoom
                    });
                    map.flyTo({center: [component.ephemeral.lon,component.ephemeral.lat], zoom: 14});

                })
            </script>
            @endscript
        </div>
    </div>
    <!-- Image Carousel Section -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-6 text-center">City Gallery</h2>
        <div class="relative">
            <!-- Image Counter -->
            <div class="absolute top-4 right-4 bg-black/60 text-white px-3 py-1 rounded-full text-sm z-10">
                {{ $currentSlide + 1 }} / {{ $totalSlides }}
            </div>

            <!-- Carousel Container -->
            <div class="relative h-[400px] overflow-hidden rounded-lg">
                <!-- Carousel Track -->
                <div class="flex h-full transition-transform duration-500" style="transform: translateX(-{{ $currentSlide * 100 }}%)">
                    @for ($i = 0; $i < $totalSlides; $i++)
                        <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">
                            <img
                                src='{{$images[$i]}}'
                                alt="Image {{ $i + 1 }}"
                                class="object-cover w-full h-full"
                            >
                        </div>
                    @endfor
                </div>

                <!-- Navigation Buttons -->
                <button
                    wire:click="previousSlide"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-lg flex items-center justify-center hover:bg-white transition-colors"
                >
                    ←
                </button>
                <button
                    wire:click="nextSlide"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-lg flex items-center justify-center hover:bg-white transition-colors"
                >
                    →
                </button>
            </div>
        </div>
    </div>
    <!-- Error State -->

</div>
