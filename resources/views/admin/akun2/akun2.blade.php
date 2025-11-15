<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>

    <style>
        body { margin: 0; background: #fff; font-family: Arial, sans-serif; }
        .header { width: 100%; height: 370px; background: url('{{ asset("assets/img/backraound.png") }}') no-repeat center/cover; position: relative; }
        .header::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.25); }
        .logo { width: 160px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -20%); z-index: 2; }
        .card-container { width: 390px; margin: -40px auto 50px; background: white; border-radius: 14px; box-shadow: 0 6px 18px rgba(0,0,0,0.25); text-align: center; overflow: hidden; padding-bottom: 20px; position: relative; z-index: 5; }
        .card-header { background: linear-gradient(#57ff71, #e8ffe9); padding: 20px; }
        .profile-img { width: 85px; height: 85px; border-radius: 50%; object-fit: cover; margin-top: -40px; background: #ddd; border: 3px solid white; }
        .field-box { display: flex; align-items: center; gap: 10px; width: 80%; margin: 10px auto; padding: 10px; background: #fafafa; border: 1px solid #ddd; border-radius: 6px; }
        .field-box img { width: 20px; }
        .field-box input { width: 100%; border: none; background: none; }
        .tingkatan-badge { padding: 6px 12px; border-radius: 6px; font-weight: bold; font-size: 13px; }
        .bronze { background: #cd7f32; color: white; }
        .silver { background: #c0c0c0; }
        .gold { background: #ffd700; }
        .platinum { background: #e5e4e2; }
        .progress-bar-container { width: 80%; margin: 10px auto; }
        .progress-bar { width: 100%; height: 10px; background: #ddd; border-radius: 20px; overflow: hidden; }
        .progress-fill { height: 100%; background: #57ff71; }
        .exp-text { font-size: 12px; margin-top: 4px; color: #555; }
        .submit-btn { background: #2196F3; color: white; padding: 10px 30px; border: none; border-radius: 8px; margin-top: 20px; cursor: pointer; }
        .submit-btn:hover { background: #0b7dda; }
        .footer { text-align: center; padding: 25px; color: #777; font-size: 14px; }
    </style>
</head>

<body>

@php
    // Hitung persentase EXP user dengan fallback aman
    $exp = $user->exp ?? 0;
    $expMax = $user->expMax ?? 100;
    $expPercentage = $expMax > 0 ? ($exp / $expMax) * 100 : 0;
@endphp

<div class="header">
    <img src="{{ asset('assets/img/logo.png') }}" class="logo">
</div>

<div class="card-container">

    <div class="card-header">
        <h3 style="margin: 0;">Akun</h3>
    </div>

    <small style="color: gray;">Google</small>

    <!-- FORM DIRECT KE HALAMAN LANDING -->
    <form action="{{ route('landing') }}" method="GET">
        <div class="field-box">
            <img src="{{ asset('assets/img/profil.png') }}">
            <input type="text" value="{{ $user->email }}" readonly>
        </div>

        <div class="field-box">
            <img src="{{ asset('assets/img/uang.png') }}">
            <input type="text" value="{{ $user->saldo }}" readonly>
        </div>

        <div class="field-box">
            <img src="{{ asset('assets/img/bronze.png') }}">
            <span class="tingkatan-badge {{ strtolower($user->tingkatan) }}">
                {{ $user->tingkatan }}
            </span>
        </div>

        <div class="progress-bar-container">
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $expPercentage }}%;"></div>
            </div>
            <div class="exp-text">{{ round($expPercentage) }}% Exp</div>
        </div>

        <button type="submit" class="submit-btn">Lanjut</button>
    </form>
</div>

<div class="footer">
    <strong>Gropo</strong><br>
    Forward Together
</div>

</body>
</html>
