<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROPO - Grobak Posko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* HEADER */
        header {
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            position: relative;
            padding-bottom: 6rem; /* beri jarak bawah untuk logo */
        }
        header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.3);
        }
        /* Navbar */
        .navbar {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
        }
        .navbar .logo {
            color: #00f0ff;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .navbar button {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: white;
        }
        /* Main logo */
        .main-logo {
            position: relative;
            z-index: 10;
            margin-top: 2rem;
        }
        /* Card Gradients */
        .card-blue-light { background: linear-gradient(135deg, #e0f7ff, #b3ecff); }
        .card-blue-medium { background: linear-gradient(135deg, #a0e7ff, #5fcfff); }
        .card-blue-dark { background: linear-gradient(135deg, #39c0ff, #0088ff); }
        /* Cards */
        .icon-card {
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s;
        }
        .icon-card:hover {
            transform: translateY(-5px);
        }
        .icon-card img {
            max-height: 6rem;
        }
        /* Tombol Lanjut */
        #btn-lanjut {
            background-color: #7fff00;
            color: black;
            font-weight: bold;
        }
        #btn-lanjut:hover {
            background-color: #6fe600;
        }
    </style>
</head>
<body class="bg-white font-sans">

<header>
    <nav class="navbar">
        <button>&#9776;</button>
        <div class="logo">GROPO</div>
        <div class="flex-1"></div>
    </nav>

    <!-- Logo Tengah -->
    <div class="main-logo flex justify-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="GROPO Logo" class="w-32 h-auto rounded-full">
    </div>
</header>

<main class="relative -mt-16 px-4 md:px-12 lg:px-24">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

        <!-- Card 1 -->
        <div class="icon-card card-blue-light">
            <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                <img src="{{ asset('assets/img/lokasi.png') }}" alt="Buka lokasi">
            </div>
            <h2 class="text-xl font-semibold mt-4 text-gray-800">Buka lokasi</h2>
        </div>

        <!-- Card 2 -->
        <div class="icon-card card-blue-medium">
            <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                <img src="{{ asset('assets/img/pesan.png') }}" alt="Pesan dan jemput">
            </div>
            <h2 class="text-xl font-semibold mt-4 text-gray-800">Pesan dan jemput</h2>
        </div>

        <!-- Card 3 -->
        <div class="icon-card card-blue-dark">
            <div class="w-32 h-32 mx-auto bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                <img src="{{ asset('assets/img/koin.png') }}" alt="Kumpulkan Koin">
            </div>
            <h2 class="text-xl font-semibold mt-4 text-gray-800">Kumpulkan Koin</h2>
        </div>

    </div>

    <!-- Tombol Lanjut -->
    <div class="text-center mt-12 mb-20">
        <a href="#" id="btn-lanjut" class="inline-block px-8 py-3 rounded-lg shadow hover:shadow-lg transition">
            Lanjut
        </a>
    </div>
</main>

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

<script>
    document.getElementById("btn-lanjut").addEventListener("click", function(e) {
        e.preventDefault();
        window.location.href = "/admin/lokasi";
    });
</script>

</body>
</html>
