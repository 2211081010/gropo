<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gropo - Home</title>

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
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-sizing: border-box;
    }

    .menu-btn {
        font-size: 28px;
        cursor: pointer;
        margin-right: 15px;
    }

    .nav-title {
        font-size: 20px;
        font-weight: bold;
    }

    /* HEADER BACKGROUND */
    .header-bg {
        height: 50vh;
        width: 100vw;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        margin-top: 55px;
    }

    /* PROFILE SECTION */
    .profile-section {
        position: absolute;
        top: 100px;
        left: 20px;
        width: calc(100% - 40px);
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .profile-left {
        display: flex;
        gap: 16px;
        align-items: center;
    }

    .avatar-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid white;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        color: white;
    }

    .username {
        font-weight: bold;
        font-size: 20px;
    }

    /* PROGRESS BAR */
    .progress-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 4px;
        position: relative;
    }

    .progress-bar-container {
        width: 150px;
        height: 18px;
        background: #e5e5e5;
        border-radius: 8px;
        position: relative;
    }

    .progress-bar {
        width: 5%;
        height: 100%;
        background: #53ff69;
        border-radius: 8px;
    }

    .progress-text {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        font-weight: bold;
        color: #333;
    }

    /* Saldo Card */
    .rp-card {
        background: linear-gradient(135deg, #ffc700, #ff8c00);
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 60px;
        height: 35px;
        font-size: 14px;
        padding: 6px 12px;
        cursor: pointer;
    }

    /* MAIN CARD */
    .main-card-wrapper {
        width: 90%;
        max-width: 400px;
        background-color: #0f2434;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 35vh;
        left: 50%;
        transform: translateX(-50%);
        z-index: 500;
    }

    .main-card-wrapper img {
        width: 200px;
    }

    .main-card-wrapper h3 {
        color: white;
        margin-top: -10px;
        font-size: 24px;
    }

    .btn-mulai {
        width: 80%;
        padding: 15px;
        background: linear-gradient(90deg, #53ff69, #53ff69, #70a1ff);
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 20px;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    /* TIER CARDS */
    .logo-wrapper {
        position: relative;
        display: inline-block;
    }

    .tier-card {
        position: absolute;
        bottom: 120%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        white-space: nowrap;
        display: none;
        z-index: 100;
        pointer-events: none;
    }

    .tier-card::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: rgba(0,0,0,0.8) transparent transparent transparent;
    }

    /* FOOTER */
    .footer {
        width: 100%;
        padding: 30px 20px;
        background: white;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        border-top: 1px solid #eee;
        margin-top: 60vh;
    }

    .footer-col {
        min-width: 100px;
        margin: 10px;
    }

    .footer-col b {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .footer-col a {
        display: block;
        text-decoration: none;
        color: #555;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .footer-brand {
        font-size: 18px;
        font-weight: bold;
    }

    .footer-social img {
        width: 20px;
        margin-right: 10px;
    }
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="menu-btn">☰</div>
    <div class="nav-title">GROPO</div>
</div>

<!-- HEADER BG -->
<div class="header-bg" style="background-image: url('{{ asset('assets/img/backraound.png') }}');"></div>

<!-- PROFILE SECTION -->
<div class="profile-section">
    <div class="profile-left">
        <!-- Avatar -->
        <div class="avatar-wrapper">
            <img src="{{ asset('assets/img/profil.png') }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <!-- Info -->
        <div class="profile-info">
            <div class="username">user@xample.com</div>

            <!-- PROGRESS -->
            <div class="progress-wrapper">
                <!-- Logo utama -->
                <img id="main-logo" src="{{ asset('assets/img/bronze.png') }}" alt="Progress Icon"
                    style="width: 45px; height: 45px; object-fit: contain; cursor: pointer;">

                <!-- Logo tambahan -->
                <div id="extra-logos" style="margin-left: 10px; gap: 8px; display: none; flex-wrap: wrap;">
                    <div class="logo-wrapper">
                        <img src="{{ asset('assets/img/bronze.png') }}" alt="Bronze" class="tier-logo" data-tier="Bronze" style="width: 35px; height: 35px; object-fit: contain; cursor:pointer;">
                        <div class="tier-card">Tingkat Bronze: Pemula</div>
                    </div>
                    <div class="logo-wrapper">
                        <img src="{{ asset('assets/img/silver.png') }}" alt="Silver" class="tier-logo" data-tier="Silver" style="width: 35px; height: 35px; object-fit: contain; cursor:pointer;">
                        <div class="tier-card">Tingkat Silver: Menengah</div>
                    </div>
                    <div class="logo-wrapper">
                        <img src="{{ asset('assets/img/gold.png') }}" alt="Gold" class="tier-logo" data-tier="Gold" style="width: 35px; height: 35px; object-fit: contain; cursor:pointer;">
                        <div class="tier-card">Tingkat Gold: Mahir</div>
                    </div>
                    <div class="logo-wrapper">
                        <img src="{{ asset('assets/img/diamond.png') }}" alt="Diamond" class="tier-logo" data-tier="Diamond" style="width: 35px; height: 35px; object-fit: contain; cursor:pointer;">
                        <div class="tier-card">Tingkat Diamond: Expert</div>
                    </div>
                </div>
            </div>

            <div class="progress-bar-container">
                <div class="progress-bar"></div>
                <span class="progress-text">3%</span>
            </div>
        </div>
    </div>

    <!-- Saldo Rp di kanan profile -->
    <a href="{{ url('/admin/akun2') }}">
        <div class="rp-card">Rp</div>
    </a>
</div>

<!-- MAIN CARD -->
<div class="main-card-wrapper">
    <img src="{{ asset('assets/img/logo.png') }}" alt="Gropo Logo">
    <h3>Grobak Posko</h3>
    <button class="btn-mulai" onclick="window.location.href='{{ route('/admin/landing') }}'">Mulai</button>
</div>

<!-- FOOTER -->
<div class="footer">
    <div class="footer-col">
        <div class="footer-brand">Gropo</div>
        <p style="font-size: 12px; color: #555;">Forward Together</p>
        <div class="footer-social" style="margin-top: 10px;">
            <a href="#"><img src="https://via.placeholder.com/20"></a>
            <a href="#"><img src="https://via.placeholder.com/20"></a>
            <a href="#"><img src="https://via.placeholder.com/20"></a>
        </div>
    </div>

    <div class="footer-col">
        <b>Features</b>
        <a href="#">Core features</a>
        <a href="#">Pro experience</a>
        <a href="#">Integrations</a>
    </div>

    <div class="footer-col">
        <b>Learn more</b>
        <a href="#">Blog</a>
        <a href="#">Case studies</a>
        <a href="#">Customer stories</a>
        <a href="#">Best practices</a>
    </div>

    <div class="footer-col">
        <b>Support</b>
        <a href="#">Contact</a>
        <a href="#">Support</a>
        <a href="#">Legal</a>
    </div>
</div>

<script>
const mainLogo = document.getElementById('main-logo');
const extraLogos = document.getElementById('extra-logos');

// Toggle logo tambahan saat logo utama diklik
mainLogo.addEventListener('click', () => {
    extraLogos.style.display = extraLogos.style.display === "none" ? "flex" : "none";
});

// Toggle card untuk tiap logo tingkatan
document.querySelectorAll('.tier-logo').forEach(logo => {
    logo.addEventListener('click', () => {
        const card = logo.nextElementSibling;

        // Sembunyikan semua card lain
        document.querySelectorAll('.tier-card').forEach(c => {
            if(c !== card) c.style.display = "none";
        });

        // Toggle card ini
        card.style.display = card.style.display === "block" ? "none" : "block";
    });
});
</script>

</body>
</html>
