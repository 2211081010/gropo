<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROPO - Grobak Posko</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <style>
        body {
            margin: 0;
            background: #f6f6f6;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(10, 15, 28, 0.8);
            backdrop-filter: blur(10px);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        .menu-btn {
            font-size: 28px;
            margin-right: 20px;
            cursor: pointer;
        }

        .nav-logo {
            font-weight: bold;
            font-size: 22px;
        }

        .nav-subtitle {
            margin-top: -4px;
            font-size: 12px;
            color: #b9e5ff;
        }

        /* HERO */
        .hero {
            background: url('{{ asset("images/silk-bg.jpg") }}') center/cover;
            padding: 40px 0 70px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero img {
            width: 220px;
            user-select: none;
        }

        /* PREVIEW */
        .preview-box {
            width: 220px;
            background: white;
            border-radius: 12px;
            margin: -40px auto 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border: 2px solid #222;
        }

        .preview-box img {
            width: 100%;
            display: block;
        }

        .btn-preview {
            background: white;
            border: none;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            font-size: 15px;
            cursor: pointer;
        }

        /* map WRAP */
        .map-wrapper {
            margin: 0 auto;
            padding: 10px;
            width: 90%;
            background: white;
            border-radius: 14px;
            border: 3px solid #71ff78;
        }

        #map {
            width: 100%;
            height: 260px;
            border-radius: 12px;
        }

        /* POSKO CARD */
        .posko-card {
            width: 90%;
            background: white;
            margin: 25px auto;
            border-radius: 14px;
            padding: 20px;
            border: 2px solid #333;
            text-align: center;
        }

        .posko-card img {
            width: 80px;
            margin-bottom: 10px;
        }

        .btn-go {
            background: #26ff6a;
            border: none;
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        footer {
            padding: 40px 20px;
            background: #fff;
            margin-top: 40px;
        }

        .footer-grid {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="menu-btn">☰</div>
        <div>
            <div class="nav-logo">GROPO</div>
            <div class="nav-subtitle">Grobak Posko</div>
        </div>
    </div>

    <!-- HERO -->
    <div class="hero">
        <img src="{{ asset('images/gropo-logo.png') }}" draggable="false">
    </div>

    <!-- PREVIEW -->
    <div class="preview-box">
        <img src="{{ asset('images/location-preview.png') }}">
        <button class="btn-preview">Buka Lokasi</button>
    </div>

    <!-- map -->
    <div class="map-wrapper">
        <div id="map"></div>
    </div>

    <!-- POSKO CARD -->
    <div class="posko-card">
        <img src="{{ asset('images/posko-car.png') }}">
        <h3>Grobak Posko</h3>
        <b>3 - 5 menit</b><br><br>
        <p>
            <b>Alamat:</b> Jl. Adam BB No.6211, RT 1, Balai-Balai, Padang Panjang Barat,
            Kota Padang Panjang, Sumatera Barat 27111
        </p>
        <button class="btn-go">Menuju lokasi</button>
    </div>

    <!-- FOOTER -->
    <footer>
        <h3>Gropo</h3>
        <p>Forward Together</p>

        <div class="footer-grid">
            <div>
                <p><b>Features</b></p>
                <p>Core features</p>
                <p>Pro experience</p>
                <p>Integrations</p>
            </div>

            <div>
                <p><b>Learn more</b></p>
                <p>Blog</p>
                <p>Case studies</p>
                <p>Customer stories</p>
                <p>Best practices</p>
            </div>

            <div>
                <p><b>Support</b></p>
                <p>Contact</p>
                <p>Support</p>
                <p>Legal</p>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // INIT map
        var map = L.map('map1').setView([-0.4673, 100.3972], 13);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: 'Gropo maps'
        }).addTo(map);

        // USER PIN
        var userIcon = L.icon({
            iconUrl: '{{ asset("images/user-pin.png") }}',
            iconSize: [45, 45],
            iconAnchor: [22, 45]
        });

        var userMarker = L.marker([-0.4673, 100.3972], { icon: userIcon }).addTo(map);

        // POSKO PIN
        var poskoIcon = L.icon({
            iconUrl: '{{ asset("images/posko-pin.png") }}',
            iconSize: [55, 55],
            iconAnchor: [28, 55]
        });

        var poskoList = [
            [-0.456, 100.40],
            [-0.47, 100.41],
            [-0.462, 100.39]
        ];

        poskoList.forEach(function(p) {
            L.marker(p, { icon: poskoIcon }).addTo(map);
        });

        // REALTIME USER LOCATION
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(function(pos) {
                userMarker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
            });
        }
    </script>

</body>

</html>
