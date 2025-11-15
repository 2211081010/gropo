<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GROPO Lokasi</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* === RESET & BODY === */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* === HEADER === */
        .header {
            width: 100%;
            height: 60px;
            background: #232931;
            display: flex;
            align-items: center;
            padding: 0 22px;
            box-sizing: border-box;
            z-index: 10;
        }

        .menu-icon {
            font-size: 24px;
            color: #fff;
            margin-right: 18px;
            cursor: pointer;
            font-weight: 900;
        }

        .header-title {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
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

        /* === TOP BACKGROUND === */
        .top-bg {
            width: 100%;
            height: 400px;
            background: #2b3543;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
        }

        .top-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(to bottom, rgba(35, 41, 49, 0.2), rgba(35, 41, 49, 0.1)),
                url('https://i.imgur.com/8Qq7yqv.jpeg');
            background-size: cover;
            background-position: center;
            opacity: 1;
        }

        /* === LOGO GROPO TENGAH === */
        .gropo-logo-container {
            position: absolute;
            z-index: 5;
            text-align: center;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
        }

        .gropo-icon {
            width: 200px;
            height: 200px;
            background-image: url('https://i.imgur.com/XFm6f6S.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0 auto 5px;
        }

        .gropo-logo-text {
            color: #37c7ba;
            font-size: 40px;
            font-weight: bold;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .gropo-logo-subtext {
            color: #d8d8d8;
            font-size: 16px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* === LOCATION CARD === */
        .location-card {
            position: absolute;
            left: 50px;
            top: 120px;
            z-index: 6;
            width: 250px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            box-sizing: border-box;
        }

        .map-icon-container {
            width: 100%;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .map-icon {
            width: 100%;
            height: 100%;
            background-image: url('https://i.imgur.com/K5zPq0z.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .location-button {
            width: 100%;
            background: #e0e0e0;
            border: none;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            color: #555;
            font-size: 17px;
            cursor: pointer;
            font-weight: bold;
        }

        /* === INSTRUCTIONS === */
        .instruction-box {
            margin: 60px auto 40px;
            width: 600px;
            max-width: 90%;
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .instruction-map-preview {
            width: 100px;
            height: 100px;
            background-image: url('https://i.imgur.com/K5zPq0z.png');
            background-size: 70%;
            background-repeat: no-repeat;
            background-position: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-right: 20px;
        }

        .instruction-text {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
        }

        /* === FOOTER === */
        footer {
            padding: 40px 50px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            border-top: 1px solid #e2e2e2;
            background: #fcfcfc;
            margin-top: auto;
        }

        .footer-col h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        .footer-col p {
            color: #777;
            font-size: 13px;
            margin: 4px 0;
        }

        .footer-social-icons i {
            font-size: 18px;
            margin-right: 12px;
            color: #777;
        }

        /* === MOBILE === */
        @media (max-width: 768px) {
            .location-card {
                left: 50%;
                top: 250px;
                transform: translateX(-50%);
            }

            .instruction-box {
                flex-direction: column;
                text-align: center;
            }

            .instruction-map-preview {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>

<div class="main-content">

    <div class="header">
        <div class="menu-icon">☰</div>
        <div class="header-title">
            <div class="h-title">GROPO</div>
            <div class="h-sub">Grobak Posko</div>
        </div>
    </div>

    <!-- BACKGROUND & LOGO -->
    <div class="top-bg">
        <div class="gropo-logo-container">
            <div class="gropo-icon"></div>
            <div class="gropo-logo-text">GROPO</div>
            <div class="gropo-logo-subtext">Grobak Posko</div>
        </div>
    </div>

    <!-- LOCATION CARD -->
    <div class="location-card">
        <div class="map-icon-container">
            <div class="map-icon"></div>
        </div>
        <button class="location-button" id="bukaLokasi">Buka Lokasi</button>
    </div>

    <!-- INSTRUCTION -->
    <div class="instruction-box">
        <div class="instruction-map-preview"></div>
        <div class="instruction-text">
            Tekan <b>Buka Lokasi</b> di atas untuk mendeteksi lokasi Anda. Setelah lokasi terdeteksi, Anda dapat memilih Gropo yang tersedia.
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer>
    <div class="footer-col">
        <h4>Gropo</h4>
        <p>Forward Together</p>
        <div class="footer-social-icons">
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fab fa-twitter"></i>
        </div>
    </div>
    <div class="footer-col">
        <h4>Features</h4>
        <p>Core features</p>
        <p>Pro experience</p>
        <p>Integrations</p>
    </div>
    <div class="footer-col">
        <h4>Learn more</h4>
        <p>Blog</p>
        <p>Case studies</p>
        <p>Customer stories</p>
        <p>Best practices</p>
    </div>
    <div class="footer-col">
        <h4>Support</h4>
        <p>Contact</p>
        <p>Support</p>
        <p>Legal</p>
    </div>
</footer>

<script>
document.getElementById('bukaLokasi').addEventListener('click', function() {
    const button = this;

    button.textContent = 'Mendeteksi Lokasi...';
    button.style.background = '#ffd700';
    button.style.color = '#555';

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        showError();
    }
});

function showPosition(position) {
    const button = document.getElementById('bukaLokasi');

    alert("Lokasi Anda Terdeteksi!");

    button.textContent = 'Lokasi Terdeteksi!';
    button.style.background = '#37c7ba';
    button.style.color = 'white';
}

function showError(error) {
    const button = document.getElementById('bukaLokasi');
    let msg = "Tidak dapat mendeteksi lokasi!";

    if (error && error.code === error.PERMISSION_DENIED) {
        msg = "Anda menolak permintaan lokasi. Harap aktifkan izin lokasi.";
    }

    alert(msg);

    button.textContent = 'Gagal Deteksi Lokasi';
    button.style.background = '#f44336';
    button.style.color = 'white';
}
</script>

</body>
</html>
