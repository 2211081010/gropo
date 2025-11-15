<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROPO - Grobak Posko</title>

    <!-- Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom CSS (opsional) -->
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage1.css') }}">
</head>

<body class="bg-white font-sans">

    <!-- HEADER -->
    <header class="relative pb-32 bg-gray-900">
        <div class="absolute inset-0 bg-black opacity-30"></div>

        <!-- Navbar -->
        <nav class="relative z-10 flex items-center px-6 py-4">
            <!-- Menu icon -->
            <button class="text-white text-2xl mr-4 focus:outline-none">&#9776;</button>

            <!-- Logo left -->
            <div class="text-white text-xl font-bold tracking-wider">
                GROPO
            </div>

            <!-- Spacer -->
            <div class="flex-1"></div>
        </nav>

        <!-- Logo & Text -->
        <div class="relative z-10 flex flex-col items-center mt-8">
            <div class="w-24 h-24 p-4 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.993-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>

            <h1 class="text-white text-2xl font-semibold mt-2">GROPO</h1>
            <p class="text-gray-300 text-sm">Grobak Posko</p>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="relative -mt-20 px-4 md:px-12 lg:px-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

            <!-- Card 1 -->
            <div class="icon-card card-blue-light p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/icons/location.svg') }}" class="h-24" alt="Buka lokasi">
                </div>
                <h2 class="text-xl font-semibold mt-4 text-gray-800">Buka lokasi</h2>
            </div>

            <!-- Card 2 -->
            <div class="icon-card card-blue-medium p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/icons/cart.svg') }}" class="h-24" alt="Pesan dan jemput">
                </div>
                <h2 class="text-xl font-semibold mt-4 text-gray-800">Pesan dan jemput</h2>
            </div>

            <!-- Card 3 -->
            <div class="icon-card card-blue-dark p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/icons/coin.svg') }}" class="h-24" alt="Kumpulkan Koin">
                </div>
                <h2 class="text-xl font-semibold mt-4 text-gray-800">Kumpulkan Koin</h2>
            </div>

        </div>

        <!-- Tombol Lanjut -->
        <div class="text-center mt-12 mb-20">
            <a href="#" id="btn-lanjut" class="inline-block px-8 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition">
                Lanjut
            </a>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white py-8 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <div>
                    <h4 class="text-xl font-bold">Gropo</h4>
                    <p class="text-sm text-gray-500">Forward Together</p>
                    <div class="flex space-x-4 mt-4 text-gray-500">
                        <a href="#">in</a>
                        <a href="#">IG</a>
                        <a href="#">X</a>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase">Features</h4>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>Core features</li>
                        <li>Pro experience</li>
                        <li>Integrations</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase">Learn more</h4>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>Blog</li>
                        <li>Case studies</li>
                        <li>Customer stories</li>
                        <li>Best practices</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold uppercase">Support</h4>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>Contact</li>
                        <li>Support</li>
                        <li>Legal</li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>

    <!-- SCRIPT -->
    <script>
        // Tombol Lanjut -> redirect ke /admin/lokasi
        document.getElementById("btn-lanjut").addEventListener("click", function(e) {
            e.preventDefault();
            window.location.href = "/admin/lokasi"; // ganti dengan route Laravel jika berbeda
        });
    </script>

</body>
</html>
