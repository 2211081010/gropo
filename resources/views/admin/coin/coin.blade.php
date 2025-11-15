<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gropo - Home</title>

    <style>
        body { margin: 0; background: #f3f3f3; font-family: Arial, sans-serif; }

        .navbar {
            width: 100%; height: 55px; background: rgba(0, 0, 0, 0.7);
            display: flex; align-items: center; padding: 0 20px; color: white;
            position: absolute; top: 0; left: 0; z-index: 1000;
            box-sizing: border-box;
        }
        .menu-btn { font-size: 28px; margin-right: 15px; cursor: pointer; }
        .nav-title { font-size: 20px; font-weight: bold; }

        .header-bg {
            height: 260px;
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            position: relative;
            margin-bottom: 20px;
        }

        .profile-section {
            position: absolute;
            top: 100px;
            left: 20px;
            width: calc(100% - 40px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-left { display: flex; align-items: center; }

        .avatar-wrapper {
            width: 90px;
            height: 90px;
            background: #ccc;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid white;
        }

        .profile-info { margin-left: 15px; color: white; }
        .username { font-size: 18px; font-weight: bold; margin-bottom: 3px; }
        .minggu-text { font-size: 14px; margin-bottom: 6px; }

        .progress-bar-container {
            width: 150px;
            height: 15px;
            background: rgba(255,255,255,0.5);
            border-radius: 7px;
            position: relative;
            overflow: hidden;
        }

        .progress-bar { height: 50%; width: 5%; background-color: #53ff69; }
        .progress-text {
            position: absolute; left: 60px; top: -1px;
            font-size: 10px; font-weight: bold; color: #222;
        }

        .rp-card {
            width: 80px;
            height: 50px;
            background: linear-gradient(135deg, #ffc700, #ff8c00);
            border-radius: 8px;
            display: flex; justify-content: center; align-items: center;
            font-size: 20px; font-weight: bold; color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .main-card-wrapper {
            margin: 100px auto 30px;
            width: 90%; max-width: 400px;
            background-color: #0f2434;
            border-radius: 15px;
            padding: 20px; text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
        .main-card-wrapper img { width: 250px; }
        .main-card-wrapper h3 { color: white; margin-top: -10px; font-size: 24px; }

        .btn-mulai {
            width: 80%; padding: 15px;
            background: linear-gradient(90deg, #53ff69, #53ff69, #70a1ff);
            border: none; border-radius: 8px;
            font-size: 18px; font-weight: bold;
            cursor: pointer; margin-top: 20px; color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .footer {
            width: 100%; padding: 30px 20px;
            background: white; display: flex;
            justify-content: space-around; flex-wrap: wrap;
            border-top: 1px solid #eee;
        }

        .footer-col { min-width: 100px; margin: 10px; }
        .footer-col b { display: block; margin-bottom: 10px; font-size: 16px; }
        .footer-col a { display: block; text-decoration: none; color: #555; font-size: 14px; margin-bottom: 5px; }

        .footer-brand { font-size: 18px; font-weight: bold; }
        .footer-social img { width: 20px; margin-right: 10px; }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="menu-btn">☰</div>
        <div class="nav-title">GROPO</div>
    </div>

    <div class="header-bg">
        <div class="profile-section">

            <div class="profile-left">
                <div class="avatar-wrapper">
                    <img src="https://via.placeholder.com/90" style="width:100%; height:100%;">
                </div>

                <div class="profile-info">
                    <div class="username">User</div>
                    <div class="minggu-text">minggu12</div>

                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                        <span class="progress-text">5%</span>
                    </div>
                </div>
            </div>

            <div class="rp-card">Rp</div>

        </div>

    </div>

    <div class="main-card-wrapper">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Gropo Logo">
        <h3>Grobak Posko</h3>

        <!-- TOMBOL SUDAH DIPERBAIKI -->
        <button class="btn-mulai" onclick="window.location.href='{{ route('landing') }}'">
            Mulai
        </button>
    </div>

    <div class="footer">
        <div class="footer-col" style="min-width: unset;">
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

</body>
</html>
