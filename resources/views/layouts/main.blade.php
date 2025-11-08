<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="d-flex flex-column min-vh-100 transition">
    <!-- NAMA WEB PLUS TOMBOL DARK MODE -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand mb-0 h1 text-white">Portal Berita</span>
            <button id="darkToggle" class="btn btn-sm btn-outline-light">Dark Mode</button>
        </div>
    </nav>

    <!-- KONTEN -->
    <main class="flex-grow-1 container mt-4">
        @yield('container')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white p-4 mt-auto text-center">
        &copy; 2025 Portal Berita<br>
        Dibuat oleh Sonia Debora
    </footer>

    <!-- BUAT DARK MODE -->
    <script>
        const toggle = document.getElementById('darkToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        });

        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
        }
    </script>
</body>
</html>