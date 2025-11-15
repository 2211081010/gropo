<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROPO - Grobak Posko</title>

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <style>
        body {
            margin: 0;
            background: #f3f3f3;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            height: 55px;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            padding: 0 20px;
            color: white;
        }

        .menu-btn {
            font-size: 28px;
            margin-right: 15px;
            cursor: pointer;
        }

        .nav-title {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-sub {
            font-size: 11px;
            margin-top: -3px;
            opacity: 0.8;
        }

        /* HEADER */
        .header {
            height: 260px;
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            display: flex;
            justify-content: center;  /* === LOGO DI TENGAH === */
            align-items: center;
            position: relative;
        }

        .header img {
            width: 260px;
        }

        /* MINI MAP CARD */
        .mini-card {
            width: 220px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            overflow: hidden;
            position: absolute;
            left: 20px;
            bottom: -60px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
        }

        #mini-map {
            width: 100%;
            height: 140px;
        }

        .btn-mini {
            width: 100%;
            padding: 8px 0;
            font-weight: bold;
            font-size: 14px;
            border: none;
            border-top: 1px solid #ccc;
            cursor: pointer;
            background: #ffffff;
        }

        /* MAP BESAR */
        .map-card {
            width: 92%;
            background: white;
            margin: 80px auto 20px;
            border-radius: 12px;
            padding: 12px;
        }

        #map {
            width: 100%;
            height: 330px;
            border-radius: 10px;
            background: #ffffff; /* MAP BACKGROUND PUTIH */
        }

        /* INFO CARD */
        .info-card {
            width: 92%;
            background: white;
            margin: 20px auto;
            padding: 25px 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card img {
            width: 80px;
        }

        .btn-green {
    width: 10%;               /* mengecilkan lebar tombol */
    padding: 10px;            /* mengecilkan tinggi tombol */
    background: #53ff69;
    border: none;
    border-radius: 8px;
    font-size: 15px;          /* font lebih kecil */
    font-weight: bold;
    cursor: pointer;
    margin: 15px auto 0;      /* tombol ditengah */
    display: block;
}

    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="menu-btn">☰</div>
        <div>
            <div class="nav-title">GROPO</div>
            <div class="nav-sub">Grobak Posko</div>
        </div>
    </div>

    <!-- HEADER -->
    <div class="header">
        <img src="{{ asset('assets/img/logo.png') }}">

        <div class="mini-card">
            <div id="mini-map"></div>
            <button class="btn-mini" onclick="focusToMap()">Buka Lokasi</button>
        </div>
    </div>

    <!-- MAP BESAR -->
    <div class="map-card">
        <div id="map"></div>
    </div>

    <!-- INFO CARD -->
    <div class="info-card">
        <img src="{{ asset('assets/img/grobak.png') }}">
        <h3>Grobak Posko Sudah Sampai!</h3>
        <p>
            <b>Alamat:</b> Jl. Adam No 68 GRT 21, Balai-Balai,
            Padang Panjang Barat, Sumatera Barat 27111
        </p>

        <button class="btn-green" onclick="goToPosko()">Lanjut</button>
    </div>

    <!-- LEAFLET JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // KOORDINAT PADANG PANJANG
        const centerPos = [-0.4667, 100.3972];

        // MAP BESAR – OSM STYLE (PUTIH)
        var map = L.map('map').setView(centerPos, 14);

        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: "© OpenStreetMap" }
        ).addTo(map);

        var poskoIcon = L.icon({
            iconUrl: '{{ asset("assets/img/grobak.png") }}',
            iconSize: [45, 45],
            iconAnchor: [20, 45]
        });

        var poskoList = [
            [-0.456, 100.40],
            [-0.47, 100.41],
            [-0.462, 100.39]
        ];

        poskoList.forEach(p => {
            L.marker(p, { icon: poskoIcon }).addTo(map);
        });

        // MINI MAP
        var miniMap = L.map('mini-map', {
            zoomControl: false,
            dragging: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            boxZoom: false,
            keyboard: false,
            tap: false,
            touchZoom: false
        }).setView(centerPos, 12);

        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        ).addTo(miniMap);

        L.marker(centerPos, { icon: poskoIcon }).addTo(miniMap);

        function focusToMap() {
            map.setView(centerPos, 16);
        }

        function goToPosko() {
            window.location.href = "/admin/koin";
        }
    </script>

</body>
</html>
