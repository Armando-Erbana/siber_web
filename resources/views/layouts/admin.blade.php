<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}?v={{ time() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafc;
            color:#0f172a;
        }
        .layout {
            display:flex;
            min-height:100vh;
        }
        .sidebar {
            width:260px;
            background:#0b2b4a;
            color:white;
            padding:24px;
        }
        .brand {
            font-size:22px;
            font-weight:800;
            margin-bottom:30px;
        }
        .brand span {
            background:#2563eb;
            padding:6px 14px;
            border-radius:20px;
            margin-right:8px;
        }
        .menu a {
            display:block;
            padding:12px 14px;
            border-radius:10px;
            color:white;
            text-decoration:none;
            margin-bottom:10px;
            font-weight:600;
            opacity:0.9;
        }
        .menu a:hover {
            background: rgba(255,255,255,0.12);
            opacity:1;
        }
        .content {
            flex:1;
            padding:30px;
        }
        .topbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }
        .card {
            background:white;
            padding:22px;
            border-radius:16px;
            border:1px solid #eef2f6;
            box-shadow:0 4px 10px rgba(0,0,0,0.03);
        }
        .btn {
            display:inline-block;
            padding:10px 18px;
            border-radius:12px;
            text-decoration:none;
            font-weight:700;
            border:none;
            cursor:pointer;
        }
        .btn-primary { background:#2563eb; color:white; }
        .btn-danger { background:#ef4444; color:white; }
        .btn-gray { background:#e2e8f0; color:#0f172a; }
        table {
            width:100%;
            border-collapse:collapse;
            margin-top:16px;
        }
        th, td {
            padding:12px;
            border-bottom:1px solid #e2e8f0;
            text-align:left;
            font-size:14px;
        }
        th { font-weight:800; }
        .alert {
            padding:14px 18px;
            border-radius:12px;
            margin-bottom:16px;
            background:#dcfce7;
            color:#166534;
            border:1px solid #bbf7d0;
            font-weight:600;
        }
        .form-group { margin-bottom:14px; }
        label { display:block; font-weight:700; margin-bottom:6px; }
        input, textarea, select {
            width:100%;
            padding:12px;
            border:1px solid #e2e8f0;
            border-radius:12px;
            outline:none;
            font-size:14px;
        }
        textarea { min-height:160px; resize:vertical; }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand"><span>Metra</span>Admin</div>

        <div class="menu">
            <a href="{{ route('admin.dashboard') }}"> Dashboard</a>
            <a href="{{ route('admin.news.index') }}"> Kelola Berita</a>

          <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-gray" style="display:block; width:100%; text-align:center; margin-top:18px; text-decoration:none; border:none; cursor:pointer; background:#e2e8f0; color:#0f172a; padding:10px 18px; border-radius:12px; font-weight:700;">
        Logout
    </button>
</form>
        </div>
    </aside>

    <main class="content">
        <div class="topbar">
            <h2>@yield('page_title', 'Admin')</h2>
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</div>
</body>
</html>