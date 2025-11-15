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

        <!-- Logo Gambar Center -->
        <div class="relative z-10 flex flex-col items-center mt-8">
            <img src="{{ asset('assets/img/logo.png') }}" alt="GROPO Logo" class="mx-auto w-32 h-auto rounded-full shadow-lg">
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="relative -mt-20 px-4 md:px-12 lg:px-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

            <!-- Card 1 -->
            <div class="icon-card card-blue-light p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/img/lokasi.png') }}" class="h-24" alt="Buka lokasi">
                </div>
                <h2 class="text-xl font-semibold mt-4 text-gray-800">Buka lokasi</h2>
            </div>

            <!-- Card 2 -->
            <div class="icon-card card-blue-medium p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/img/pesan.png') }}" class="h-24" alt="Pesan dan jemput">
                </div>
                <h2 class="text-xl font-semibold mt-4 text-gray-800">Pesan dan jemput</h2>
            </div>

            <!-- Card 3 -->
            <div class="icon-card card-blue-dark p-6">
                <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('assets/img/koin.png') }}" class="h-24" alt="Kumpulkan Koin">
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
