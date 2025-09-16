<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Mini</title>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-gradient-to-r from-indigo-600 to-blue-500 shadow-lg">
        <div class="container mx-auto flex flex-col items-center py-6">
            <h1 class="text-3xl md:text-4xl font-bold text-white">📖 Perpustakaan Mini</h1>
            <p class="text-indigo-100 mt-2">Sistem manajemen perpustakaan sederhana & modern</p>

            <!-- Navbar -->
            <nav class="mt-4 flex space-x-6">
                <a href="/" class="text-white hover:text-yellow-300 font-semibold transition">Beranda</a>
                <a href="/Buku" class="text-white hover:text-yellow-300 font-semibold transition">Data Buku</a>
                <a href="/Anggota" class="text-white hover:text-yellow-300 font-semibold transition">Data Anggota</a>
                <a href="/Peminjaman" class="text-white hover:text-yellow-300 font-semibold transition">Peminjaman</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-8">

            <!-- Card Buku -->
            <div class="bg-white shadow-xl rounded-2xl p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-indigo-100 text-indigo-600 w-16 h-16 flex items-center justify-center rounded-full mb-4 text-2xl">📚</div>
                    <h2 class="text-xl font-bold mb-2 text-indigo-700">Data Buku</h2>
                    <p class="text-gray-600 mb-4">Lihat, tambah, atau hapus data buku.</p>
                    <a href="/Buku" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">Kelola Buku</a>
                </div>
            </div>

            <!-- Card Anggota -->
            <div class="bg-white shadow-xl rounded-2xl p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-green-100 text-green-600 w-16 h-16 flex items-center justify-center rounded-full mb-4 text-2xl">👥</div>
                    <h2 class="text-xl font-bold mb-2 text-green-700">Data Anggota</h2>
                    <p class="text-gray-600 mb-4">Kelola informasi anggota perpustakaan.</p>
                    <a href="/Anggota" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold">Kelola Anggota</a>
                </div>
            </div>

            <!-- Card Peminjaman -->
            <div class="bg-white shadow-xl rounded-2xl p-8 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-yellow-100 text-yellow-600 w-16 h-16 flex items-center justify-center rounded-full mb-4 text-2xl">🔄</div>
                    <h2 class="text-xl font-bold mb-2 text-yellow-700">Peminjaman</h2>
                    <p class="text-gray-600 mb-4">Catat peminjaman & pengembalian buku.</p>
                    <a href="/Peminjaman" class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition font-semibold">Kelola Peminjaman</a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-12">
        <p>&copy; 2025 <span class="text-indigo-400 font-semibold">Perpustakaan Mini</span> • Dibuat dengan menggunakan Laravel & Tailwind CSS</p>
    </footer>

</body>
</html>
    