<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Metra TV</title>
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
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: var(--paper);
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            padding: 100px 20px 60px;
            -webkit-font-smoothing: antialiased;
        }

        /* --- TOPBAR --- */
        .topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 72px;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--paper);
            border-bottom: 3px solid var(--line-strong);
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Newsreader', serif;
            font-size: 17px;
            font-weight: 500;
        }

        .brand img { height: 26px; }

        .topbar-cta { font-size: 13px; color: var(--muted); }
        .topbar-cta a {
            color: var(--ink);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            border-bottom: 1.5px solid var(--accent-soft);
        }
        .topbar-cta a:hover { border-bottom-color: var(--accent); }

        /* --- REGISTER CARD --- */
        .register-container {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--line);
            border-top: 3px solid var(--accent);
            padding: 44px 42px;
        }

        .header { margin-bottom: 32px; }

        .header p {
            font-size: 12px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 8px;
        }

        .header h1 {
            font-family: 'Newsreader', serif;
            font-size: 30px;
            font-weight: 500;
            line-height: 1.2;
        }

        /* --- FORM ELEMENTS --- */
        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 7px;
        }

        .input-control {
            width: 100%;
            background: var(--paper);
            border: 1px solid var(--line);
            padding: 11px 14px;
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            border-radius: 2px;
            transition: border-color 0.15s ease;
        }

        .input-control::placeholder { color: #a89f8e; }

        .input-control:focus {
            outline: none;
            border-color: var(--ink);
        }

        /* --- BUTTON --- */
        .btn-submit {
            width: 100%;
            background: var(--ink);
            color: var(--paper);
            border: none;
            border-bottom: 3px solid var(--accent);
            padding: 13px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.15s ease, border-color 0.15s ease;
            margin-top: 6px;
            border-radius: 2px;
            font-family: 'Inter', sans-serif;
        }

        .btn-submit:hover {
            background: var(--accent);
            border-bottom-color: var(--ink);
        }

        /* --- UTILS --- */
        .error-alert {
            background: var(--accent-soft);
            border-left: 3px solid var(--accent);
            padding: 12px 15px;
            font-size: 13px;
            color: var(--accent);
            margin-bottom: 24px;
        }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }

        .footer-note {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            font-size: 12px;
            color: var(--muted);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 600px) {
            .card { padding: 34px 24px; }
            .grid-2 { grid-template-columns: 1fr; }
            .topbar { padding: 0 20px; }
            .header h1 { font-size: 26px; }
        }
    </style>
</head>
<body>

<nav class="topbar">
    <div class="brand">
        <img src="{{ asset('logo.png') }}" alt="Metra TV">
        <span>Metra TV</span>
    </div>
    <div class="topbar-cta">
        Punya akun? <a href="{{ route('login') }}">Masuk</a>
    </div>
</nav>

<div class="register-container">
    <div class="card">
        <div class="header">
            <p>Portal Registrasi</p>
            <h1>Daftar Akun Admin</h1>
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