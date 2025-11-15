<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>GROPO Login</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #ffffff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

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

    .header-left {
        display: flex;
        align-items: center;
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

    .top-bg {
        width: 100%;
        height: 230px;
        background: #2b3543;
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column;
        padding-top: 25px;
    }

    .top-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('assets/img/backround.png') }}'); /* hanya gambar */
    background-size: cover;       /* gambar menutupi seluruh area */
    background-position: center;  /* posisi tengah */
    background-repeat: no-repeat; /* jangan ulangi gambar */
    z-index: 0;
}


    .gropo-logo-container {
        position: relative;
        z-index: 5;
        text-align: center;
        margin-top: -10px;
    }

    .gropo-icon {
        width: 110px;
        height: 110px;
        background-image: url('https://i.imgur.com/XFm6f6S.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        margin: 0 auto 10px;
    }

    .gropo-logo-text {
        color: #37c7ba;
        font-size: 30px;
        font-weight: bold;
        line-height: 1.1;
        text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .gropo-logo-subtext {
        color: #d8d8d8;
        font-size: 12px;
        text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .login-card {
        margin: -60px auto 40px;
        position: relative;
        z-index: 5;
        width: 380px;
        background: #fff;
        border-radius: 12px;
        padding: 40px 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        box-sizing: border-box;
    }

    .google-text {
        font-size: 18px;
        font-weight: 500;
        color: #4a4a4a;
        margin-bottom: 20px;
    }

    .profile-circle {
        width: 96px;
        height: 96px;
        background: #e4e4e4;
        border-radius: 50%;
        margin: 0 auto 30px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23b8b8b8" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.38 0 2.5 1.12 2.5 2.5S13.38 10 12 10 9.5 8.88 9.5 7.5 10.62 5 12 5zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.88 6-3.88s5.97 1.89 6 3.88c-1.29 1.94-3.5 3.22-6 3.22z"/></svg>');
        background-size: 70%;
        background-repeat: no-repeat;
        background-position: center;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 13px 2px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        margin-top: 15px;
        font-size: 16px;
        text-align: center;
        background-color: #e8e8e8;
        color: #333;
    }

    button[type="submit"] {
        width: 100%;
        background: #4285f4;
        border: none;
        padding: 13px;
        border-radius: 8px;
        margin-top: 25px;
        color: white;
        font-size: 17px;
        cursor: pointer;
        font-weight: bold;
    }

    footer {
        padding: 40px 50px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        color: #555;
        font-size: 14px;
        border-top: 1px solid #e2e2e2;
        margin-top: auto;
    }

    .footer-section {
        width: 180px;
        margin-bottom: 20px;
    }

    .footer-socials {
        margin-top: 15px;
        display: flex;
        gap: 15px;
        font-size: 20px;
    }

    @media (max-width: 768px) {
        .login-card { width: 90%; }
        footer { flex-direction: column; padding: 30px 20px; }
        .footer-section { width: 100%; margin-bottom: 25px; }
    }
</style>
</head>
<body>

<div class="main-content">
    <div class="header">
        <div class="menu-icon">☰</div>
        <div class="header-left">
            <div class="header-title">
                <div class="h-title">GROPO</div>
                <div class="h-sub">Grobak Posko</div>
            </div>
        </div>
    </div>

    <div class="top-bg">
        <div class="gropo-logo-container">
            <div class="gropo-icon"></div>
            <div class="gropo-logo-text">GROPO</div>
            <div class="gropo-logo-subtext">Grobak Posko</div>
        </div>
    </div>

    <div class="login-card">
        <div class="google-text">Login</div>
        <div class="profile-circle"></div>

        <form id="loginForm">
            <input id="email" type="email" required placeholder="Email" />
            <input id="password" type="password" required placeholder="Password" />
            <button type="submit">Berikutnya</button>
        </form>
    </div>
</div>

<footer>
    <div class="footer-section">
        <h4>Gropo</h4>
        <p>Forward Together</p>
        <div class="footer-socials">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <div class="footer-section">
        <h4>Features</h4>
        <p>Core Features</p>
        <p>Pro experience</p>
    </div>

    <div class="footer-section">
        <h4>Learn more</h4>
        <p>Blog</p>
        <p>Case studies</p>
    </div>

    <div class="footer-section">
        <h4>Support</h4>
        <p>Contact</p>
        <p>Support</p>
    </div>
</footer>

<script>
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    if(email === "" || password === "") {
        alert("Email dan password wajib diisi!");
        return;
    }

    // Demo validasi sederhana
    // Di sini bisa diganti validasi backend jika sudah ada server
    if(email === "user@example.com" && password === "123456") {
        // Redirect ke landing page setelah login
        window.location.href = "/admin/landing";
    } else {
        alert("Email atau password salah!");
    }
});
</script>

</body>
</html>
