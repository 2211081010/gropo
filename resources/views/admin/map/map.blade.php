<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GROPO - Grobak Posko</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body { margin: 0; font-family: Arial; background: #f6f6f6; }

        .navbar {
            background: #0A0F1C; color: white; padding: 15px 20px;
            display: flex; align-items: center;
        }
        .menu-btn { font-size: 28px; cursor: pointer; margin-right: 20px; }
        .nav-title { font-weight: bold; font-size: 20px; }
        .nav-subtitle { font-size: 11px; margin-top: -3px; }

        /* HERO BACKGROUND */
        .hero {
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            height: 220px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero img {
            width: 140px;
            z-index: 2;
        }

        /* PREVIEW CARD */
        .preview-box {
            position: absolute;
            bottom: -45px;
            background: #fff;
            width: 150px;
            border-radius: 12px;
            border: 3px solid #3b82f6;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 3;
            text-align: center;
            left: 20px !important;
        }

        .preview-box img { width: 100%; }
        .btn-preview {
            width: 100%; padding: 10px; border: none;
            background: #3b82f6; color: white;
            font-weight: bold; cursor: pointer;
        }

        /* MAP */
        .map-container {
            margin: 60px 20px 20px 20px;
            background: white; padding: 15px;
            border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        #map { height: 260px; width: 100%; border-radius: 10px; }

        /* LIST */
        .list-container {
            margin: 20px; background: #fff; padding: 15px;
            border-radius: 15px;
        }

        .posko-item {
            display: flex; justify-content: space-between; align-items: center;
            border: 2px solid #ddd; margin-bottom: 15px;
            padding: 10px; border-radius: 12px; transition: 0.2s;
        }

        .status-green {
            background: #4aff79; padding: 7px 15px; border-radius: 10px;
            font-weight: bold; cursor: pointer;
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
        <img src="{{ asset('assets/img/logo.png') }}">

        <!-- PREVIEW BOX -->
        <div class="preview-box">
            <img src="{{ asset('assets/img/lokasi.png') }}" id="previewImg">
            <button class="btn-preview" id="previewBtn">Deteksi Lokasi Saya</button>
        </div>
    </div>

    <!-- MAP -->
    <div class="map-container">
        <div id="map"></div>
    </div>

    <!-- LIST POSKO -->
    <div class="list-container" id="poskoListContainer"></div>

    <!-- Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        /* ===========================
           DATA GROBAK / POSKO
        ============================ */
        const grobak = [
            {
                id: 1,
                name: "Grobak Posko A",
                alamat: "Jl. Merdeka No.12, Padang",
                coords: [-0.939, 100.420],
                img: "{{ asset('assets/img/lokasi.png') }}"
            },
            {
                id: 2,
                name: "Grobak Posko B",
                alamat: "Jl. Khatib Sulaiman No.5, Padang",
                coords: [-0.945, 100.415],
                img: "{{ asset('assets/img/lokasi.png') }}"
            },
            {
                id: 3,
                name: "Grobak Posko C",
                alamat: "Jl. Veteran No.88, Padang",
                coords: [-0.954, 100.425],
                img: "{{ asset('assets/img/lokasi.png') }}"
            }
        ];

        const listContainer = document.getElementById("poskoListContainer");

        /* =========================================
           TAMPILKAN DAFTAR POSKO
        =========================================== */
        grobak.forEach(g => {
            listContainer.innerHTML += `
                <div class="posko-item" id="posko${g.id}">
                    <div>
                        <b>${g.name}</b><br>
                        <span class="distance">Lokasi belum terdeteksi</span>
                    </div>

                    <div class="status-green" onclick="gotoMap(${g.id})">
                        Tersedia
                    </div>
                </div>`;
        });

        /* ==================================================
           FUNGSI PINDAH HALAMAN KE MAP DETAIL POSKO
        ==================================================== */
        function gotoMap(id) {
            const g = grobak.find(x => x.id === id);

            const lat = g.coords[0];
            const lng = g.coords[1];
            const nama = encodeURIComponent(g.name);
            const alamat = encodeURIComponent(g.alamat);

            window.location.href =
                `/admin/map1?lat=${lat}&lng=${lng}&nama=${nama}&alamat=${alamat}`;
        }

        /* ========================================
           MAP AWAL
        ========================================= */
        var map = L.map('map').setView([-0.945, 100.420], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        const iconGrobak = L.icon({
            iconUrl: "https://i.ibb.co/WfxgR9D/posko-pin.png",
            iconSize: [45, 45],
            iconAnchor: [22, 45]
        });

        let userMarker = null;
        let userLocation = null;

        /* ========================================
           HITUNG JARAK
        ========================================= */
        function hitungJarak(lat1, lon1, lat2, lon2) {
            const R = 6371e3;
            const toRad = d => d * Math.PI / 180;

            const dLat = toRad(lat2 - lat1);
            const dLon = toRad(lon2 - lon1);

            const a =
                Math.sin(dLat/2)**2 +
                Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                Math.sin(dLon/2)**2;

            return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        }

        /* ========================================
           UPDATE JARAK USER KE POSKO
        ========================================= */
        function updateJarakUser(){
            if(!userLocation) return;

            grobak.forEach(g => {
                const jarak = hitungJarak(
                    userLocation.lat, userLocation.lng,
                    g.coords[0], g.coords[1]
                );

                const textJarak = jarak < 1000 ?
                    `${Math.round(jarak)} m` :
                    `${(jarak / 1000).toFixed(2)} km`;

                const menit = Math.round(jarak / 80);

                document.querySelector(`#posko${g.id} .distance`).innerText =
                    `Jarak: ${textJarak} • ${menit} menit`;
            });
        }

        /* ========================================
           TAMBAHKAN MARKER SETIAP POSKO
        ========================================= */
        grobak.forEach(g => {
            const marker = L.marker(g.coords, { icon: iconGrobak }).addTo(map);

            marker.on("click", () => {
                document.querySelectorAll(".posko-item")
                    .forEach(c => c.style.borderColor = "#ddd");

                document.getElementById(`posko${g.id}`).style.borderColor = "#4aff79";

                document.getElementById("previewImg").src = g.img;

                document.getElementById(`posko${g.id}`).scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
            });
        });

        /* ========================================
           DETEKSI LOKASI USER
        ========================================= */
        document.getElementById("previewBtn").addEventListener("click", () => {
            navigator.geolocation.getCurrentPosition(
                pos => {
                    const { latitude, longitude } = pos.coords;

                    userLocation = { lat: latitude, lng: longitude };

                    if(userMarker) map.removeLayer(userMarker);

                    userMarker = L.marker([latitude, longitude]).addTo(map)
                        .bindPopup("Lokasi Anda").openPopup();

                    map.setView([latitude, longitude], 14);

                    updateJarakUser();
                },
                () => {
                    alert("Gagal mendeteksi lokasi.");
                }
            );
        });
    </script>

</body>
</html>
