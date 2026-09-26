<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Metra TV</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #171310;
            --paper: #f6f3ec;
            --card: #ffffff;
            --line: #ddd6c6;
            --line-strong: #171310;
            --muted: #726a5a;
            --accent: #9c1c1c;
            --accent-soft: #f5e6e1;
            --danger: #9c1c1c;
            --danger-soft: #f5e6e1;
            --success: #3f6b3f;
            --success-soft: #eef3ea;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            -webkit-font-smoothing: antialiased;
        }

        /* ─── LEFT PANEL ─── */
        .panel-left {
            flex: 1;
            background: var(--ink);
            color: var(--paper);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 56px 64px;
            position: relative;
            overflow: hidden;
        }

        .brand-mark {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(246,243,236,0.65);
            position: relative;
            z-index: 2;
        }

        .brand-mark::before {
            content: "";
            width: 7px;
            height: 7px;
            background: var(--accent);
            display: inline-block;
        }

        /* Broadcast rings — a single deliberate motif tied to the subject (a TV/news network) */
        .broadcast-rings {
            position: absolute;
            right: -140px;
            top: 50%;
            transform: translateY(-50%);
            width: 480px;
            height: 480px;
            z-index: 1;
        }

        .left-content {
            max-width: 420px;
            position: relative;
            z-index: 2;
        }

        .headline {
            font-family: 'Newsreader', serif;
            font-size: clamp(32px, 3.4vw, 44px);
            font-weight: 500;
            line-height: 1.25;
            letter-spacing: -0.01em;
            margin-bottom: 18px;
            border-bottom: 3px solid var(--accent);
            padding-bottom: 22px;
        }

        .subheadline {
            font-size: 14.5px;
            color: rgba(246,243,236,0.6);
            line-height: 1.75;
            font-weight: 400;
        }

        .stats-row {
            display: flex;
            gap: 36px;
            margin-top: 40px;
            position: relative;
            z-index: 2;
        }

        .stat {
            border-top: 1px solid rgba(246,243,236,0.2);
            padding-top: 12px;
        }

        .stat-num {
            font-family: 'Newsreader', serif;
            font-size: 22px;
            font-weight: 500;
        }

        .stat-label {
            font-size: 11.5px;
            color: rgba(246,243,236,0.5);
            margin-top: 3px;
        }

        /* ─── RIGHT PANEL ─── */
        .panel-right {
            width: 460px;
            flex-shrink: 0;
            background: var(--paper);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .form-card {
            width: 100%;
            background: var(--card);
            border: 1px solid var(--line);
            border-top: 3px solid var(--accent);
            padding: 44px 40px;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 26px;
        }

        .logo-area img {
            height: 34px;
            width: auto;
            object-fit: contain;
        }

        .logo-divider {
            width: 1px;
            height: 20px;
            background: var(--line);
        }

        .logo-tagline {
            font-size: 12px;
            color: var(--muted);
            font-weight: 500;
        }

        .form-title {
            font-family: 'Newsreader', serif;
            font-size: 24px;
            font-weight: 500;
            color: var(--ink);
            line-height: 1.3;
            margin-bottom: 6px;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: var(--muted);
        }

        /* Alerts */
        .alert-success {
            background: var(--success-soft);
            border-left: 3px solid var(--success);
            padding: 11px 14px;
            color: var(--success);
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-error {
            background: var(--danger-soft);
            border-left: 3px solid var(--danger);
            padding: 11px 14px;
            color: var(--danger);
            margin-bottom: 18px;
            font-size: 13px;
        }

        /* Form */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 7px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            width: 16px;
            height: 16px;
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1px solid var(--line);
            background: var(--paper);
            border-radius: 2px;
            outline: none;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            transition: border-color 0.15s ease;
        }

        input::placeholder {
            color: #a89f8e;
        }

        input:focus {
            border-color: var(--ink);
        }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 2px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.15s ease, border-color 0.15s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: var(--ink);
            color: var(--paper);
            border-bottom: 3px solid var(--accent);
        }

        .btn-primary:hover {
            background: var(--accent);
            border-bottom-color: var(--ink);
        }

        .form-footer {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        .extra-links {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
        }

        .extra-links a {
            color: var(--ink);
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1.5px solid var(--accent-soft);
        }

        .extra-links a:hover {
            border-bottom-color: var(--accent);
        }

        /* Responsive */
        @media (max-width: 900px) {
            body {
                flex-direction: column;
            }

            .panel-left {
                padding: 40px 32px;
            }

            .broadcast-rings {
                display: none;
            }

            .stats-row {
                gap: 24px;
                margin-top: 28px;
            }

            .panel-right {
                width: 100%;
                padding: 40px 24px;
            }
        }

        @media (max-width: 480px) {
            .form-card {
                padding: 32px 26px;
            }

            .panel-left {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>

<!-- ═══ LEFT PANEL ═══ -->
<div class="panel-left">
    <div class="brand-mark">Metra TV Network</div>

    <svg class="broadcast-rings" viewBox="0 0 480 480" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="240" cy="240" r="60" stroke="#9c1c1c" stroke-opacity="0.5" stroke-width="1.5"/>
        <circle cx="240" cy="240" r="120" stroke="#f6f3ec" stroke-opacity="0.12" stroke-width="1.5"/>
        <circle cx="240" cy="240" r="180" stroke="#f6f3ec" stroke-opacity="0.08" stroke-width="1.5"/>
        <circle cx="240" cy="240" r="238" stroke="#f6f3ec" stroke-opacity="0.05" stroke-width="1.5"/>
    </svg>

    <div class="left-content">
        <h2 class="headline">Suara Dunia,<br>Hadir Untukmu</h2>
        <p class="subheadline">
            Platform digital terdepan yang menyajikan berita akurat,
            analisis tajam, dan perspektif global untuk pembaca modern.
        </p>
    </div>

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

<!-- ═══ RIGHT PANEL ═══ -->
<div class="panel-right">
    <div class="form-card">
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

            <h1 class="form-title">Masuk ke Admin Sistem Berita</h1>
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
                Masuk ke Portal Admin
            </button>
        </form>

        <div class="form-footer">
            <div class="extra-links">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>