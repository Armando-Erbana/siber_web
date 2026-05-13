<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Metra TV</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #0a0f1e;
            --paper: #f5f0e8;
            --gold: #c9a84c;
            --gold-light: #e8c96a;
            --red: #c0392b;
            --blue-deep: #0d1f3c;
            --blue-mid: #1a3a6e;
            --silver: #8b9ab0;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            font-family: 'DM Sans', sans-serif;
            background: var(--ink);
            overflow: hidden;
        }

        /* ─── LEFT PANEL ─── */
        .panel-left {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 48px;
            overflow: hidden;
        }

        .bg-video-placeholder {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(160deg, #0d1f3c 0%, #1a3a6e 40%, #0a0f1e 100%);
            z-index: 0;
        }

        /* Animated grid lines */
        .grid-lines {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image:
                linear-gradient(rgba(201,168,76,0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,168,76,0.07) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: gridShift 20s linear infinite;
        }

        @keyframes gridShift {
            0% { background-position: 0 0; }
            100% { background-position: 60px 60px; }
        }

        /* Globe / circle deco */
        .globe-deco {
            position: absolute;
            top: -120px;
            right: -120px;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            border: 1px solid rgba(201,168,76,0.15);
            z-index: 2;
            box-shadow:
                0 0 0 60px rgba(201,168,76,0.04),
                0 0 0 120px rgba(201,168,76,0.025),
                0 0 0 200px rgba(201,168,76,0.01);
            animation: pulse 6s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.03); opacity: 1; }
        }

        /* Ticker strip */
        .ticker {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 36px;
            background: var(--gold);
            display: flex;
            align-items: center;
            overflow: hidden;
            z-index: 10;
        }

        .ticker-label {
            flex-shrink: 0;
            background: var(--red);
            color: white;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            padding: 0 16px;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .ticker-track {
            display: flex;
            gap: 60px;
            animation: tickerScroll 25s linear infinite;
            white-space: nowrap;
            padding-left: 30px;
        }

        .ticker-track span {
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
            letter-spacing: 0.5px;
        }

        @keyframes tickerScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Left content */
        .left-content {
            position: relative;
            z-index: 5;
            animation: fadeUp 0.9s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .edition-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 3px;
            color: var(--gold);
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .edition-tag::before {
            content: '';
            display: block;
            width: 24px;
            height: 2px;
            background: var(--gold);
        }

        .headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 4vw, 58px);
            font-weight: 900;
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .headline em {
            font-style: italic;
            color: var(--gold);
        }

        .subheadline {
            font-size: 14px;
            color: var(--silver);
            line-height: 1.7;
            max-width: 420px;
            margin-bottom: 32px;
            font-weight: 300;
        }

        .stats-row {
            display: flex;
            gap: 32px;
        }

        .stat {
            border-left: 2px solid var(--gold);
            padding-left: 12px;
        }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--white);
        }

        .stat-label {
            font-size: 11px;
            color: var(--silver);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ─── RIGHT PANEL ─── */
        .panel-right {
            width: 460px;
            flex-shrink: 0;
            background: var(--paper);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 56px 48px;
            position: relative;
            overflow: hidden;
        }

        .panel-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--red), var(--gold));
        }

        /* decorative quote mark */
        .deco-quote {
            position: absolute;
            bottom: -20px;
            right: -10px;
            font-family: 'Playfair Display', serif;
            font-size: 260px;
            font-weight: 900;
            color: rgba(0,0,0,0.04);
            line-height: 1;
            user-select: none;
            pointer-events: none;
        }

        .form-header {
            margin-bottom: 36px;
            animation: slideIn 0.7s ease 0.2s both;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .logo-area img {
            height: 44px;
            width: auto;
            object-fit: contain;
        }

        .logo-divider {
            width: 1px;
            height: 32px;
            background: #c8bfaf;
        }

        .logo-tagline {
            font-size: 11px;
            color: #7a6e60;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: #7a6e60;
        }

        /* Alerts */
        .alert-success {
            background: #e8f5e9;
            border-left: 3px solid #2e7d32;
            padding: 12px 14px;
            border-radius: 4px;
            color: #1b5e20;
            margin-bottom: 20px;
            font-size: 13px;
            animation: slideIn 0.5s ease both;
        }

        .alert-error {
            background: #fdecea;
            border-left: 3px solid var(--red);
            padding: 12px 14px;
            border-radius: 4px;
            color: #7f1d1d;
            margin-bottom: 20px;
            font-size: 13px;
            animation: slideIn 0.5s ease both;
        }

        /* Form */
        .login-form {
            animation: slideIn 0.7s ease 0.35s both;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #5a4e40;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9e8f7e;
            width: 16px;
            height: 16px;
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 13px 14px 13px 42px;
            border: 1.5px solid #d4c9b8;
            background: var(--white);
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            transition: all 0.25s;
        }

        input::placeholder {
            color: #b8a898;
        }

        input:focus {
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(10,15,30,0.08);
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.25s;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-primary {
            background: var(--ink);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(201,168,76,0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s;
        }

        .btn-primary:hover::before {
            transform: translateX(100%);
        }

        .btn-primary:hover {
            background: var(--blue-mid);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(10,15,30,0.2);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .form-footer {
            margin-top: 28px;
            animation: slideIn 0.7s ease 0.5s both;
        }

        .extra-links {
            text-align: center;
            font-size: 13px;
            color: #7a6e60;
            margin-bottom: 14px;
        }

        .extra-links a {
            color: var(--ink);
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1.5px solid var(--gold);
            padding-bottom: 1px;
            transition: color 0.2s;
        }

        .extra-links a:hover {
            color: var(--gold);
        }

        .divider {
            height: 1px;
            background: #d4c9b8;
            margin: 16px 0;
        }

        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 12px;
            color: #9e8f7e;
            text-decoration: none;
            letter-spacing: 1px;
            transition: color 0.2s;
        }

        .back-home:hover {
            color: var(--ink);
        }

        .back-home svg {
            width: 14px;
            height: 14px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            body {
                overflow: auto;
                flex-direction: column;
            }

            .panel-left {
                min-height: 260px;
                padding: 60px 32px 36px;
            }

            .stats-row {
                gap: 20px;
            }

            .panel-right {
                width: 100%;
                padding: 40px 32px;
            }
        }

        @media (max-width: 480px) {
            .panel-right {
                padding: 36px 24px;
            }

            .panel-left {
                padding: 60px 24px 32px;
            }
        }
    </style>
</head>
<body>

<!-- ═══ LEFT PANEL ═══ -->
<div class="panel-left">
    <div class="bg-video-placeholder"></div>
    <div class="grid-lines"></div>
    <div class="globe-deco"></div>

    <!-- Breaking news ticker -->
    <div class="ticker">
        <div class="ticker-track">
            <span>Metra TV — Portal Berita</span>
            <span>•</span>
            <span>Ikuti perkembangan berita terkini dari seluruh dunia</span>
            <span>•</span>
            <span>Liputan eksklusif, analisis mendalam, dan wawancara khusus</span>
            <span>•</span>
            <span>Metra TV — Portal Berita Nasional &amp; Internasional Terpercaya</span>
            <span>•</span>
            <span>Ikuti perkembangan berita terkini dari seluruh dunia</span>
            <span>•</span>
            <span>Liputan eksklusif, analisis mendalam, dan wawancara khusus</span>
        </div>
    </div>

    <div class="left-content">
        <div class="edition-tag">Metra TV Network</div>

        <h2 class="headline">
            Suara Dunia,<br>
            <em>Hadir Untukmu</em>
        </h2>

        <p class="subheadline">
            Platform digital terdepan yang menyajikan berita akurat,
            analisis tajam, dan perspektif global untuk pembaca modern.
        </p>

        <div class="stats-row">
            <div class="stat">
                <div class="stat-num">24/7</div>
                <div class="stat-label">Berita Efektif</div>
            </div>
            <div class="stat">
                <div class="stat-num">180+</div>
                <div class="stat-label">Media</div>
            </div>
            <div class="stat">
                <div class="stat-num">50+</div>
                <div class="stat-label">Negara Cakupan</div>
            </div>
        </div>
    </div>
</div>

<!-- ═══ RIGHT PANEL ═══ -->
<div class="panel-right">
    <div class="deco-quote">"</div>

    <div class="form-header">
        <div class="logo-area">
            <img
                src="{{ asset('logo.png') }}"
                alt="Metra TV Logo"
                loading="lazy"
            >
            <div class="logo-divider"></div>
            <div class="logo-tagline">Metra TV</div>
        </div>

        <h1 class="form-title">Masuk ke<br>Admin Sistem Berita</h1>
        <p class="form-subtitle">Login untuk mengelola konten media</p>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- ✅ FORM TETAP SAMA --}}
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <div class="input-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 6.75L2.25 6.75"/>
                </svg>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@MetraTV.co.id" required>
            </div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                <input type="password" name="password" placeholder="Kata sandi Anda..." required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Masuk ke Portal admin &rarr;
        </button>
    </form>

    <div class="form-footer">
        <div class="extra-links">
            Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>

        <div class="divider"></div>
    </div>
</div>

</body>
</html>