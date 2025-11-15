<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>

    <style>
        body {
            margin: 0;
            background: #fff;
            font-family: Arial, sans-serif;
        }

        /* HEADER BERGAMBAR + OVERLAY GELAP */
        .header {
            width: 100%;
            height: 370px;
            background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover;
            position: relative;
        }

        /* Lapisan gelap agar mirip gambar */
        .header::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.25);
        }

        /* Logo di tengah */
        .logo {
            width: 160px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -20%);
            z-index: 2;
        }

        /* CARD dibawah header */
       .card-container {
    width: 390px;
    margin: -40px auto 50px; /* DULUNYA -50px → Sekarang dinaikkan lagi */
    background: white;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    text-align: center;
    overflow: hidden;
    padding-bottom: 20px;
    position: relative;
    z-index: 5; /* agar muncul di atas header */
        }

        /* Header hijau tipis */
        .card-header {
            background: linear-gradient(#57ff71, #e8ffe9);
            padding: 20px;
        }

        /* Foto profil */
        .profile-img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: -40px;
            background: #ddd;
            border: 3px solid white;
        }

        /* Field Box */
        .field-box {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 80%;
            margin: 10px auto;
            padding: 10px;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .field-box img {
            width: 20px;
        }

        .field-box input {
            width: 100%;
            border: none;
            background: none;
        }

        /* Tingkatan badge */
        .tingkatan-badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 13px;
        }

        .bronze { background: #cd7f32; color: white; }
        .silver { background: #c0c0c0; }
        .gold { background: #ffd700; }
        .platinum { background: #e5e4e2; }

        /* Progress bar EXP */
        .progress-bar-container {
            width: 80%;
            margin: 10px auto;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: #ddd;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            width: 30%;
            height: 100%;
            background: #57ff71;
        }

        .exp-text {
            font-size: 12px;
            margin-top: 4px;
            color: #555;
        }

        /* Tombol */
        .submit-btn {
            background: #2196F3;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0b7dda;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <img src="{{ asset('assets/img/logo.png') }}" class="logo">
    </div>

    <!-- CARD -->
    <div class="card-container">

        <div class="card-header">
            <h3 style="margin: 0;">Akun</h3>
        </div>

        <img src="{{ asset('assets/img/propil.png') }}" class="profile-img">

        <h3>{{ $user->username }}</h3>
        <small style="color: gray;">Google</small>

        <!-- FORM -->
        <form>

            <div class="field-box">
                <img src="{{ asset('assets/img/propil.png') }}">
                <input type="text" value="{{ $user->email }}" readonly>
            </div>

            <div class="field-box">
                <img src="{{ asset('assets/img/wa.png') }}">
                <input type="text" value="{{ $user->nomor }}" readonly>
            </div>

            <div class="field-box">
                <img src="{{ asset('assets/img/uang.png') }}">
                <input type="text" value="{{ $user->saldo }}" readonly>
            </div>

            <!-- Tingkatan -->
            <div class="field-box">
                <img src="{{ asset('assets/img/bronze.png') }}">
                <span class="tingkatan-badge {{ strtolower($user->tingkatan) }}">
                    {{ $user->tingkatan }}
                </span>
            </div>

            <!-- Progress EXP 30% seperti screenshot -->
            <div class="progress-bar-container">
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
                <div class="exp-text">3% Exp</div>
            </div>

            <button class="submit-btn">Lanjut</button>

        </form>
    </div>

    <div class="footer">
        <strong>Gropo</strong><br>
        Forward Together
    </div>

</body>
</html>
