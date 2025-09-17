<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Mini</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="bg-gray-100 text-gray-800 justify-left">

    <header class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold flex items-center gap-2">
                📚 Perpustakaan Mini
            </h1>
            <nav class="space-x-6">
                <a href="http://127.0.0.1:8000/" class="hover:underline">Beranda</a>
                <a href="http://127.0.0.1:8000/Buku" class="hover:underline">Data Buku</a>
                <a href="http://127.0.0.1:8000/Anggota" class="hover:underline">Data Anggota</a>
                <a href="http://127.0.0.1:8000/Peminjaman" class=" hover:underline font-semibold">Peminjaman</a>
            </nav>
        </div>
    </header>

    <main class="p-0">
        @yield('content')
    </main>
 @stack('scripts')
</body>
</html>
