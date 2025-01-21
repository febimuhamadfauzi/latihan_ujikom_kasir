<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Admin</title>
    @vite(['resources/css/style.css'])
</head>
<body>
    <!-- Header / Navbar -->
    <header class="navbar">
        <div class="navbar-container">
            <h1>Kasir Admin</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="/">Transaksi</a></li>
                    <li><a href="/">Produk</a></li>
                    <li><a href="/">Laporan</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Wrapper untuk mengelola layout -->
    <div class="wrapper">
        <!-- Konten utama -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Kasir Aplikasi - Semua hak dilindungi</p>
    </footer>
</body>
</html>
