<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GROPO - Grobak Posko</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f6f6f6;
        }

        /* NAVBAR */
        .navbar {
            background: #0A0F1C;
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        .menu-btn {
            font-size: 28px;
            cursor: pointer;
            margin-right: 20px;
        }

        .nav-title {
            font-weight: bold;
            font-size: 20px;
        }

        .nav-subtitle {
            font-size: 11px;
            margin-top: -3px;
        }

        /* HERO */
        .hero {
            background: url('https://i.ibb.co/19qvFQH/silk-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 170px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hero img {
            width: 130px;
        }

        /* SMALL PREVIEW CARD */
        .preview-box {
            margin: 10px;
            background: #fff;
            width: 200px;
            border-radius: 10px;
            border: 2px solid #ccc;
            overflow: hidden;
            margin-left: 20px;
        }

        .preview-box img {
            width: 100%;
        }

        .btn-preview {
            width: 100%;
            padding: 10px;
            border: none;
            background: #000;
            color: white;
            font-weight: bold;
        }

        /* MAP CONTAINER */
        #map {
            height: 250px;
            width: 100%;
            border-radius: 10px;
        }

        .map-container {
            margin: 20px;
            background: white;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* LIST POSKO */
        .list-container {
            margin: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 15px;
        }

        .posko-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #ddd;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 12px;
        }

        .status-green {
            background: #4aff79;
            padding: 7px 15px;
            border-radius: 10px;
            font-weight: bold;
        }

        .status-red {
            background: #f39c12;
            padding: 7px 15px;
            border-radius: 10px;
            font-weight: bold;
        }

        /* FOOTER */
        footer {
            text-align: left;
            padding: 40px 20px;
            margin-top: 40px;
            background: #fff;
        }

        footer p {
            margin: 4px 0;
        }

        .footer-title {
            font-weight: bold;
            font-size: 20px;
        }

        .footer-sub {
            font-size: 13px;
            margin-bottom: 20px;
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
            <div class="nav-title">GROPO</div>
            <div class="nav-subtitle">Grobak Posko</div>
        </div>
    </div>

    <!-- HERO -->
    <div class="hero">
        <img src="https://i.ibb.co/2YCNjzn/gropo-logo.png">
    </div>

    <!-- SMALL PREVIEW -->
    <div class="preview-box">
        <img src="https://i.ibb.co/8z2TBqy/location-thumb.jpg">
        <button class="btn-preview">Buka Lokasi</button>
    </div>

    <!-- MAIN MAP -->
    <div class="map-container">
        <div id="map"></div>
    </div>

    <!-- POSKO LIST -->
    <div class="list-container">
        <div class="posko-item">
            <div>
                <b>Grobak Posko</b><br>3 - 5 menit
            </div>
            <div class="status-green">Tersedia</div>
        </div>

        <div class="posko-item">
            <div>
                <b>Grobak Posko</b><br>5 - 10 menit
            </div>
            <div class="status-green">Tersedia</div>
        </div>

        <div class="posko-item">
            <div>
                <b>Grobak Posko</b><br>5 - 10 menit
            </div>
            <div class="status-red">Tidak tersedia</div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-title">Gropo</div>
        <div class="footer-sub">Forward Together</div>

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
        // INIT MAP
        var map = L.map('map').setView([-0.9471, 100.4172], 13); // Padang default

        // Tile layer dark theme
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // USER ICON
        var userIcon = L.icon({
            iconUrl: "https://i.ibb.co/K2HqLjn/user-pin.png",
            iconSize: [40, 40],
            iconAnchor: [20, 40]
        });

        var userMarker = L.marker([-0.9471, 100.4172], { icon: userIcon }).addTo(map);

        // TRACK USER LOCATION
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(
                function (pos) {
                    var lat = pos.coords.latitude;
                    var lon = pos.coords.longitude;

                    userMarker.setLatLng([lat, lon]); // update icon position
                    map.setView([lat, lon]); // auto follow
                },
                function (err) {
                    console.log("GPS Error:", err);
                },
                { enableHighAccuracy: true }
            );
        } else {
            alert("Browser tidak mendukung GPS.");
        }

        // STATIC POSKO MARKERS
        var poskoIcon = L.icon({
            iconUrl: "https://i.ibb.co/WfxgR9D/posko-pin.png",
            iconSize: [45, 45],
            iconAnchor: [22, 45]
        });

        var poskoList = [
            [-0.939, 100.42],
            [-0.945, 100.415],
            [-0.954, 100.42]
        ];

        poskoList.forEach(p => L.marker(p, { icon: poskoIcon }).addTo(map));
    </script>
</body>

</html>
