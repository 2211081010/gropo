<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #08a0e2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            animation: fadeIn 0.5s ease-in;
        }

        /* Spinner Animation */
        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Loading Text */
        .loading-text {
            color: white;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .loading-text::after {
            content: '';
            animation: dots 1.5s steps(4, end) infinite;
        }

        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }

        /* Progress Bar */
        .progress-bar {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #fff, #667eea);
            width: 0%;
            animation: progress 2s ease-in-out infinite;
            border-radius: 10px;
        }

        @keyframes progress {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 100%; }
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #031b84, #20d0f8, #4becb6, #4facfe);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            z-index: -1;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Pulse dots */
        .pulse-dots {
            display: flex;
            gap: 8px;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            animation: pulse 1.5s ease-in-out infinite;
        }

        .pulse-dot:nth-child(1) { animation-delay: 0s; }
        .pulse-dot:nth-child(2) { animation-delay: 0.2s; }
        .pulse-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <div class="loading-container">
        <!-- Spinner -->
        <div class="spinner"></div>

        <!-- Loading Text -->
        <div class="loading-text">Memuat</div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>

        <!-- Pulse Dots -->
        <div class="pulse-dots">
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
        </div>
    </div>

    <script>
        // Optional: Redirect setelah loading selesai
        setTimeout(() => {
            // Ganti dengan halaman tujuan Anda
            window.location.href = '/login';
            console.log('Loading selesai!');
        }, 5000);
    </script>
</body>
</html>
