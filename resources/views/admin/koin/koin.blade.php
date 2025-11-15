<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gropo - Grobak Posko</title>

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
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 20px;
            color: white;
            box-sizing: border-box;
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
            opacity: 0.8;
            display: none;
        }

        /* HEADER */
        .header {
            height: 260px;
            background: #0f2434;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .header-content {
            text-align: center;
        }

        .header img {
            width: 200px;
            max-width: 80%;
        }

        /* MINI MAP */
        .mini-map-wrapper {
            width: 280px;
            position: absolute;
            top: 100px;
            left: 20px;
            z-index: 999;
        }

        .mini-card {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border: 3px solid white;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4);
        }

        #mini-map {
            width: 100%;
            height: 140px;
        }

        .btn-mini {
            width: 100%;
            padding: 10px;
            background: #f1f1f1;
            border-radius: 0 0 10px 10px;
            font-size: 15px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        /* MAP BESAR */
        .map-card {
            width: 98%;
            background: white;
            margin: 40px auto 20px;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        #map {
            width: 100%;
            height: 330px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .leaflet-container .leaflet-control-zoom {
            display: none !important;
        }

        /* INFO CARD */
        .info-card {
            width: 98%;
            background: white;
            margin: 20px auto 40px;
            padding: 30px 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card img {
            width: 100px;
            margin-bottom: 15px;
        }

        .info-card h3 {
            margin: 15px 0;
            font-size: 20px;
            color: #1f1f1f;
        }

        .reward-section {
            display: flex;
            justify-content: center;
            margin: 15px 0 20px;
        }

        .reward-item {
            display: flex;
            align-items: center;
            margin: 0 20px;
            font-size: 16px;
        }

        .reward-item img {
            width: 32px;
            margin-right: 8px;
        }

        /* BUTTON LANJUT */
        .btn-green {
            width: 150px;
            padding: 12px;
            background: #53ff69;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0, 255, 0, 0.3);
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
        <div class="header-content">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            {{-- <div style="font-size: 16px; color: white; margin-top: 5px;">Grobak Posko</div> --}}
        </div>
    </div>

    <!-- MINI MAP -->
    <div class="mini-map-wrapper">
        <div class="mini-card">
            <div id="mini-map"></div>
            <button class="btn-mini" onclick="focusToMap()">Buka Lokasi</button>
        </div>
    </div>

    <!-- MAP UTAMA -->
    <div class="map-card">

        <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
            <div style="padding: 6px 12px; background: #e0e0e0; border-radius: 6px;">
                <span style="color: #555; font-weight: bold;">Rute</span>
            </div>
        </div>

        <div id="map"></div>
    </div>

    <!-- INFO CARD -->
    <div class="info-card">

        <img src="{{ asset('assets/img/success.png') }}" alt="Order Success">

        <h3>Terimakasih sudah memesan :</h3>

        <div class="reward-section">
            <div class="reward-item">
                <img src="{{ asset('assets/img/uang.png') }}" alt="Reward Point"> + 5
            </div>

            <div class="reward-item">
                <img src="{{ asset('assets/img/bronze.png') }}" alt="Reward Badge"> + 30
            </div>
        </div>

        <button class="btn-green">Lanjut</button>
    </div>


    <!-- SCRIPT -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const centerPos = [-0.4673, 100.3972];

        /* MAP BESAR */
        var map = L.map('map').setView(centerPos, 14);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© OpenStreetMap"
        }).addTo(map);

        var poskoIcon = L.icon({
            iconUrl: '{{ asset("assets/img/grobak.png") }}',
            iconSize: [45, 45],
            iconAnchor: [22, 45]
        });

        var userIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
            iconSize: [30, 30],
            iconAnchor: [15, 30]
        });

        var poskoList = [
            [-0.456, 100.40],
            [-0.47, 100.41],
            [-0.462, 100.39]
        ];

        poskoList.forEach(p => {
            L.marker(p, { icon: poskoIcon }).addTo(map);
        });

        var userLocation = centerPos;
        L.marker(userLocation, { icon: userIcon }).addTo(map);

        /* MINI MAP */
        var miniMap = L.map('mini-map', {
            zoomControl: false,
            dragging: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            boxZoom: false,
            keyboard: false,
            tap: false,
            touchZoom: false
        }).setView(centerPos, 13);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")
            .addTo(miniMap);

        L.marker(userLocation, { icon: poskoIcon }).addTo(miniMap);

        function focusToMap() {
            map.setView(centerPos, 16);
        }
    </script>

</body>
</html>
