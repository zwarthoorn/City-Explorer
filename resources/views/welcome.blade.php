<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City Explorer</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href='https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.css' rel='stylesheet' />
        <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.umd.js"></script>
    </head>
    <body class="h-full">
        <!-- Header Section -->
        <header class="relative bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-8">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-4">City Explorer</h1>
                <p class="text-lg mb-4">Discover weather, maps, and photos of cities around the world</p>

                <!-- Auth Buttons (Logged Out State) -->
                <div class="absolute top-4 right-4 space-x-4">
                    <a href="#" class="inline-block px-4 py-2 border-2 border-white rounded-lg hover:bg-white/10 transition-colors">
                        Login
                    </a>
                    <a href="#" class="inline-block px-4 py-2 bg-white text-blue-500 rounded-lg hover:bg-gray-100 transition-colors">
                        Register
                    </a>
                </div>

                <!-- User Menu (Logged In State) -->
                <div class="absolute top-4 right-4 hidden">
                    <div class="bg-white rounded-lg shadow-lg w-64">
                        <div class="p-4 border-b border-gray-200 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-800">John Doe</div>
                                <div class="text-sm text-gray-500">john@example.com</div>
                            </div>
                        </div>

                        <div class="p-2">
                            <!-- Favorites Section -->
                            <div class="mb-4">
                                <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">
                                    Favorites
                                </h3>
                                <div class="space-y-1">
                                    <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                        Paris, France
                                    </button>
                                    <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                        Tokyo, Japan
                                    </button>
                                </div>
                            </div>

                            <!-- Recent Searches -->
                            <div class="mb-4">
                                <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">
                                    Recent Searches
                                </h3>
                                <div class="space-y-1">
                                    <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                        London, UK
                                    </button>
                                    <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                        Barcelona, Spain
                                    </button>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-2">
                                <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                    Settings
                                </button>
                                <button class="w-full px-3 py-2 text-left text-red-600 hover:bg-gray-100 rounded-lg">
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="container mx-auto px-4 py-8">
            <!-- Search Section -->
            <div class="mb-8 text-center">
                <input type="text"
                    placeholder="Search for a city..."
                    class="w-full max-w-2xl mx-auto px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                >
            </div>

            <!-- Main Content Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <!-- Weather Card -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-center">
                        <h2 class="text-xl font-semibold mb-4">Current Weather</h2>
                        <div class="text-5xl font-bold mb-4">23°C</div>
                        <p class="text-gray-600 mb-4">Partly Cloudy</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="font-semibold">Humidity</div>
                                <div class="text-gray-600">65%</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="font-semibold">Wind</div>
                                <div class="text-gray-600">12 km/h</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Container -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 h-full min-h-[400px]">
                        <div class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">
                            <div id="map" class="w-full h-full rounded-lg"></div>
                        </div>
                    </div>
                </div>
                <script>
                    maptilersdk.config.apiKey = 'BY2OGOzy0ZHXoLWJDZ1i';
                    const map = new maptilersdk.Map({
                        container: 'map', // container's id or the HTML element in which the SDK will render the map
                        style: maptilersdk.MapStyle.STREETS,
                        center: [-0.1276474, 51.5073219], // starting position [lng, lat]
                        zoom: 10 // starting zoom
                    });
                </script>
            </div>

            <!-- Image Carousel Section -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center">City Gallery</h2>

                <div class="relative">
                    <!-- Image Counter -->
                    <div class="absolute top-4 right-4 bg-black/60 text-white px-3 py-1 rounded-full text-sm z-10">
                        1 / 10
                    </div>

                    <!-- Carousel Container -->
                    <div class="relative h-[400px] overflow-hidden rounded-lg">
                        <!-- Carousel Track -->
                        <div class="flex h-full transition-transform duration-500">
                            {{--                            {/* 10 Slides */}--}}
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 1</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 2</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 3</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 4</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 5</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 6</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 7</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 8</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 9</div>
                            <div class="flex-none w-full h-full bg-gray-100 flex items-center justify-center">Image 10</div>
                        </div>

                        <!-- Navigation Buttons -->
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-lg flex items-center justify-center hover:bg-white transition-colors">
                            ←
                        </button>
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/90 shadow-lg flex items-center justify-center hover:bg-white transition-colors">
                            →
                        </button>

                        <!-- Dots Navigation -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error State -->
            <div class="hidden mt-4 p-4 bg-red-50 text-red-600 rounded-lg text-center">
                Unable to load city data. Please try again later.
            </div>
        </main>
    </body>
</html>
