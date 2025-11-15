<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GROPO Lokasi</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
        }

        /* HEADER */
        .header {
            width: 100%;
            height: 60px;
            background: #232931;
            display: flex;
            align-items: center;
            padding: 0 22px;
            color: white;
        }

        .menu-icon {
            font-size: 24px;
            margin-right: 18px;
            cursor: pointer;
            font-weight: 900;
        }

        .h-title {
            color: #37c7ba;
            font-size: 22px;
            font-weight: bold;
        }

        .h-sub {
            color: #a4a4a4;
            font-size: 10px;
            margin-top: -3px;
        }

        /* TOP BACKGROUND */
        .top-bg {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
        }

        .top-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .7;
        }

        /* LOGO */
        .gropo-logo-container {
            position: absolute;
            top: 90px;
            width: 100%;
            text-align: center;
            z-index: 3;
        }

        .gropo-icon {
            width: 200px;
            height: 200px;
            margin: 0 auto 10px;
        }

        .gropo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* LOCATION CARD */
        .location-card {
            position: absolute;
            top: 130px;
            left: 50px;
            z-index: 4;
            width: 250px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .map-icon img {
            width: 100%;
            height: 180px;
            object-fit: contain;
        }

        .location-button {
            width: 100%;
            background: #e0e0e0;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            border: none;
            font-size: 17px;
        }

        /* INSTRUCTION */
        .instruction-box {
            margin: 60px auto;
            width: 600px;
            max-width: 90%;
            display: flex;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            align-items: center;
        }

        .instruction-map-preview img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-right: 20px;
        }

        /* FOOTER */
        footer {
            padding: 40px 50px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            border-top: 1px solid #e2e2e2;
            background: #fcfcfc;
            margin-top: 50px;
        }
    </style>
</head>

<body>

<div class="header">
    <div class="menu-icon">☰</div>
    <div>
        <div class="h-title">GROPO</div>
        <div class="h-sub">Grobak Posko</div>
    </div>
</div>

<!-- BACKGROUND -->
<div class="top-bg">
    <img src="{{ asset('assets/img/backraound.png') }}" alt="Background">
</div>

<!-- LOGO -->
<div class="gropo-logo-container">
    <div class="gropo-icon">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
    </div>
</div>

<!-- LOCATION CARD -->
<div class="location-card">
    <div class="map-icon">
        <img src="{{ asset('assets/img/lokasi.png') }}" alt="Map">
    </div>
    <button class="location-button" id="bukaLokasi">Buka Lokasi</button>
</div>

<!-- INSTRUCTION -->
<div class="instruction-box">
    <div class="instruction-map-preview">
        <img src="{{ asset('assets/img/lokasi.png') }}" alt="Preview">
    </div>
    <div>Tekan <b>Buka Lokasi</b> untuk mendeteksi lokasi Anda lalu pilih Gropo yang tersedia.</div>
</div>

<!-- FOOTER -->
<footer>
    <div>
        <h4>Gropo</h4>
        <p>Forward Together</p>
    </div>
</footer>

<script>
document.getElementById('bukaLokasi').addEventListener('click', function() {
    const btn = this;
    btn.textContent = 'Mendeteksi...';
    btn.style.background = '#ffd700';

    navigator.geolocation.getCurrentPosition(
        (pos) => {
            btn.textContent = 'Lokasi Terdeteksi!';
            btn.style.background = '#37c7ba';
            btn.style.color = 'white';

            // ➜ Redirect ke halaman map/page2 setelah sukses
            window.location.href = "map/page2";
        },
        () => {
            btn.textContent = 'Gagal Mendeteksi';
            btn.style.background = '#f44336';
            btn.style.color = 'white';
        }
    );
});
</script>

</body>
</html>
