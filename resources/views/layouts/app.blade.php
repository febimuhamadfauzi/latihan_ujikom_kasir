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
            @if (auth()->user()->role === 'admin')
                <h1>Kasir Admin</h1>
            @elseif (auth()->user()->role === 'petugas')
                <h1>Kasir Petugas</h1>
            @else
                <h1>Kasir Pemilik</h1>
            @endif
            <nav>
                <button class="navbar-toggle" id="navbar-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
                <ul id="navbar-menu">
                    @if (auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="/">Transaksi</a></li>
                    <li><a href="{{ route('admin.products.index') }}">Produk</a></li>
                    <li><a href="/">Laporan</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @elseif (auth()->user()->role === 'petugas')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="/">Transaksi</a></li>
                    <li><a href="/">Laporan</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="/">Laporan</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endif
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

    <script>
        const toggleButton = document.querySelector('.navbar-toggle');
        const navLinks = document.querySelector('nav ul');

        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

</body>
</html>
