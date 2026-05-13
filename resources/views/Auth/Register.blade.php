<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Metra TV</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;0,700;1,300;1,400;1,700&family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #040508;
            --surface: rgba(13, 18, 33, 0.7);
            --gold: #d4af37;
            --gold-light: #f1d592;
            --gold-glow: rgba(212, 175, 55, 0.3);
            --red: #e63946;
            --white: #f8f9fa;
            --text-muted: #94a3b8;
            --border: rgba(255, 255, 255, 0.06);
            --glass-border: rgba(212, 175, 55, 0.2);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            overflow-x: hidden;
            padding: 40px 20px;
        }

        /* --- BACKGROUND ANIMATION --- */
        .bg-mesh {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(181, 41, 42, 0.05) 0%, transparent 40%);
        }

        .bg-lines {
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: 0.15;
            background-image: linear-gradient(var(--border) 1px, transparent 1px), linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 50px 50px;
            mask-image: radial-gradient(circle at center, black, transparent 80%);
        }

        /* --- MARQUEE NEWS --- */
        .news-marquee {
            position: fixed;
            top: 54px;
            width: 100%;
            border-bottom: 1px solid var(--border);
            padding: 8px 0;
            background: rgba(4, 5, 8, 0.5);
            backdrop-filter: blur(10px);
            z-index: 90;
        }

        .marquee-content {
            display: flex;
            white-space: nowrap;
            animation: scroll 60s linear infinite;
            font-family: 'Cormorant Garamond', serif;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.5;
        }

        @keyframes scroll {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        /* --- NAVIGATION --- */
        .topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 60px;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(4, 5, 8, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand img { height: 22px; filter: brightness(1.2); }

        .topbar-cta { font-size: 12px; color: var(--text-muted); }
        .topbar-cta a { color: var(--gold); text-decoration: none; font-weight: 700; margin-left: 5px; }

        /* --- REGISTER CARD --- */
        .register-container {
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 10;
        }

        .card {
            background: var(--surface);
            backdrop-filter: blur(30px);
            border: 1px solid var(--border);
            border-top: 3px solid var(--gold);
            padding: 50px;
            border-radius: 4px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -1px; left: 0; right: 0; height: 100px;
            background: linear-gradient(180deg, rgba(212, 175, 55, 0.05) 0%, transparent 100%);
            pointer-events: none;
        }

        /* --- TYPOGRAPHY --- */
        .header { text-align: center; margin-bottom: 40px; }
        
        .header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 10px;
        }

        .header h1 span { color: var(--gold); font-style: italic; }
        
        .header p {
            font-size: 14px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        /* --- FORM ELEMENTS --- */
        .form-group { margin-bottom: 24px; position: relative; }

        .label-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            color: var(--gold);
        }

        .input-control {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            padding: 14px 16px;
            color: var(--white);
            font-family: inherit;
            font-size: 14px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .input-control:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.02);
            box-shadow: 0 0 15px var(--gold-glow);
        }

        /* --- BUTTON --- */
        .btn-submit {
            width: 100%;
            background: var(--gold);
            color: #000;
            border: none;
            padding: 16px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            border-radius: 2px;
        }

        .btn-submit:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .btn-submit:active { transform: translateY(0); }

        /* --- UTILS --- */
        .error-alert {
            background: rgba(230, 57, 70, 0.1);
            border-left: 3px solid var(--red);
            padding: 12px 15px;
            font-size: 12px;
            color: #ffb3b3;
            margin-bottom: 30px;
        }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        .footer-note {
            text-align: center;
            margin-top: 25px;
            font-size: 11px;
            color: var(--text-muted);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 600px) {
            .card { padding: 30px 20px; }
            .grid-2 { grid-template-columns: 1fr; }
            .topbar { padding: 0 20px; }
            .header h1 { font-size: 32px; }
        }
    </style>
</head>
<body>

<div class="bg-mesh"></div>
<div class="bg-lines"></div>

<nav class="topbar">
    <div class="brand">
        <img src="{{ asset('logo.png') }}" alt="Metra TV">
        <span>METRA TV</span>
    </div>
    <div class="topbar-cta">
        Punya akun? <a href="{{ route('login') }}">MASUK</a>
    </div>
</nav>

<div class="news-marquee">
    <div class="marquee-content">
        REDAKSI PUSAT &nbsp;•&nbsp; LIVE UPDATE 24/7 &nbsp;•&nbsp; JURNALISME BERINTEGRITAS &nbsp;•&nbsp; METRA TV DIGITAL &nbsp;•&nbsp; EKONOMI & BISNIS &nbsp;•&nbsp; POLITIK DUNIA &nbsp;•&nbsp; REDAKSI PUSAT &nbsp;•&nbsp; LIVE UPDATE 24/7 &nbsp;•&nbsp; JURNALISME BERINTEGRITAS &nbsp;•&nbsp; 
    </div>
</div>

<div class="register-container">
    <div class="card">
        <div class="header">
            <p>PORTAL REGISTRASI</p>
            <h1>Admin</span></h1>
        </div>

        @if($errors->any())
            <div class="error-alert">
                <strong>Peringatan:</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="input-control" value="{{ old('name') }}" placeholder="Contoh: Adrian Wijaya" required>
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" class="input-control" value="{{ old('email') }}" placeholder="email@metratv.co.id" required>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Kata Sandi</label>
                    <input type="password" name="password" class="input-control" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi</label>
                    <input type="password" name="password_confirmation" class="input-control" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">Daftar Sekarang</button>

            <div class="footer-note">
                Sistem Keamanan Terenkripsi SSL &copy; 2026 Metra TV Network
            </div>
        </form>
    </div>
</div>

</body>
</html>