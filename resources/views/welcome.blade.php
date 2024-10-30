<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City Explorer</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href='https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.css' rel='stylesheet' />
        <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.3.0/maptiler-sdk.umd.js"></script>
        @livewireStyles
    </head>
    <body class="h-full">
        <!-- Header Section -->
        <header class="relative bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-8">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-4">City Explorer</h1>
                <p class="text-lg mb-4">Discover weather, maps, and photos of cities around the world</p>

                <!-- Auth Buttons (Logged Out State) -->
                <div class="absolute top-4 right-4 space-x-4 {{ empty($recents)? '' : 'hidden' }}">
                    <a href="login" class="inline-block px-4 py-2 border-2 border-white rounded-lg hover:bg-white/10 transition-colors">
                        Login
                    </a>
                    <a href="/register" class="inline-block px-4 py-2 bg-white text-blue-500 rounded-lg hover:bg-gray-100 transition-colors">
                        Register
                    </a>
                </div>

                <!-- User Menu (Logged In State) -->
                <div class="absolute top-4 right-4 {{ empty($recents) ? 'hidden' : '' }}">
                    <div class="bg-white rounded-lg shadow-lg w-64">

                        <div class="p-2">
                            <!-- Recent Searches -->
                            <div class="mb-4">
                                <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">
                                    Recent Searches
                                </h3>
                                <div class="space-y-1">
                                    @foreach($recents as $recent)
                                        <button class="w-full px-3 py-2 text-left text-gray-700 hover:bg-gray-100 rounded-lg">
                                           {{$recent->city}}
                                        </button>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="container mx-auto px-4 py-8">
            <livewire:show-posts />
        </main>

    </body>
</html>
