<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROPO - Grobak Posko</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <style>
        body {
            margin: 0;
            background: #f6f6f6;
            font-family: Arial, sans-serif;
        }

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
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            padding: 40px 0 50px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .hero img {
            width: 220px;
            user-select: none;
        }

        /* PREVIEW */
        .preview-wrapper {
            position: absolute;
            bottom: -40px;
            left: 20px;
            z-index: 50;
        }

        .preview-box {
            width: 220px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
            border: 2px solid #222;
            overflow: hidden;
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

        /* MAP */
        .map-wrapper {
            width: 90%;
            background: white;
            border-radius: 13px;
            margin: 70px auto 20px;
            padding: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        #map {
            width: 100%;
            height: 350px;
            border-radius: 10px;
        }

        /* POSKO DETAIL */
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
            width: 10%;
            padding: 12px;
            margin-top: 15px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
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
        <img src="{{ asset('assets/img/logo.png') }}">

        <div class="preview-wrapper">
            <div class="preview-box">
                <img src="{{ asset('assets/img/lokasi.png') }}">
                <button class="btn-preview" onclick="goToUserLocation()">Buka Lokasi</button>
            </div>
        </div>
    </div>

    <!-- MAP -->
    <div class="map-wrapper">
        <div id="map"></div>
    </div>

    <!-- POSKO DETAIL -->
    <div class="posko-card">
        <img src="{{ asset('assets/img/grobak.png') }}">
        <h3 id="posko-name">Memuat...</h3>
        <b id="posko-time">-- menit</b><br><br>
        <p id="posko-address">Memuat alamat...</p>
        <button class="btn-go" onclick="goToPosko()">Menuju lokasi</button>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        /* === AMBIL DATA POSKO DARI HALAMAN SEBELUMNYA (URL PARAMETER) === */
        const url = new URL(window.location.href);
        const poskoLat = parseFloat(url.searchParams.get("lat"));
        const poskoLng = parseFloat(url.searchParams.get("lng"));
        const poskoName = url.searchParams.get("nama") || "Grobak Posko";
        const poskoAlamat = url.searchParams.get("alamat") || "Alamat tidak tersedia";

        document.getElementById("posko-name").innerText = poskoName;
        document.getElementById("posko-address").innerText = poskoAlamat;

        /* === INISIALISASI MAP === */
        var map = L.map('map').setView([poskoLat, poskoLng], 15);

        L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        /* === ICON === */
        var userIcon = L.icon({
            iconUrl: '{{ asset("assets/img/user-pin.png") }}',
            iconSize: [45, 45],
            iconAnchor: [22, 45]
        });

        var poskoIcon = L.icon({
            iconUrl: '{{ asset("assets/img/grobak.png") }}',
            iconSize: [60, 60],
            iconAnchor: [30, 60]
        });

        /* === TAMPILKAN POSISI GROBAK (DARI HALAMAN SEBELUMNYA) === */
        var poskoMarker = L.marker([poskoLat, poskoLng], { icon: poskoIcon }).addTo(map);

        /* === USER === */
        var userMarker = L.marker([0, 0], { icon: userIcon }).addTo(map);

        /* === TEKAN "BUKA LOKASI" === */
        function goToUserLocation() {
            navigator.geolocation.getCurrentPosition(function (pos) {
                var lat = pos.coords.latitude;
                var lng = pos.coords.longitude;

                userMarker.setLatLng([lat, lng]);
                map.setView([lat, lng], 16);

                hitungWaktu(lat, lng);
            });
        }

        /* === UPDATE USER LOKASI REALTIME === */
        navigator.geolocation.watchPosition(function (pos) {
            userMarker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
        });

        /* === HITUNG WAKTU TEMPUH === */
        function hitungWaktu(lat1, lon1) {
            var R = 6371;

            var dLat = (poskoLat - lat1) * Math.PI / 180;
            var dLon = (poskoLng - lon1) * Math.PI / 180;

            var a = Math.sin(dLat / 2) ** 2 +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(poskoLat * Math.PI / 180) *
                Math.sin(dLon / 2) ** 2;

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var jarak = R * c; // km

            var menit = Math.round(jarak / 0.06); // estimasi jalan kaki

            if (menit < 1) menit = 1;

            document.getElementById("posko-time").innerHTML = menit + " menit";
        }

        /* === MENUJU HALAMAN POSKO === */
        function goToPosko() {
            const poskoPage = "/admin/posko"; // ganti dengan nama file halaman posko yang sebenarnya
            const url = `${poskoPage}?lat=${poskoLat}&lng=${poskoLng}&nama=${encodeURIComponent(poskoName)}`;
            window.location.href = url;
        }
    </script>

</body>
</html>
