    @extends('layouts.app')

    @section('content')
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'swal-sm',
                        title: 'swal-title-sm',
                        htmlContainer: 'swal-text-sm',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            </script>
            <style>
                /* Perkecil ukuran popup jadi ±50% */
                .swal2-popup.swal-sm {
                    font-size: 0.8rem !important;
                    /* perkecil teks */
                    width: 22em !important;
                    /* perkecil lebar box */
                    padding: 1em !important;
                }

                .swal2-title.swal-title-sm {
                    font-size: 1.1rem !important;
                    /* judul lebih kecil */
                }

                .swal2-html-container.swal-text-sm {
                    font-size: 0.9rem !important;
                    /* isi teks lebih kecil */
                }
            </style>
        @endif

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white text-center py-10">
            <h2 class="text-3xl font-bold">📖 Data Peminjaman</h2>
            <p class="mt-2 text-lg">Kelola data peminjaman & pengembalian buku</p>
        </section>

        <!-- Konten Utama -->
        <main class="container mx-auto px-6 py-10 flex-grow ">
            <!-- Tombol Tambah -->
            <div class="flex justify-end mb-6">
                <a href="{{ route('Peminjaman.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    ➕ Tambah Peminjaman
                </a>
            </div>

            <!-- Tabel Peminjaman -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-4 py-3">Nama Anggota</th>
                            <th class="px-4 py-3">Judul Buku</th>
                            <th class="px-4 py-3 text-center">Tanggal Pinjam</th>
                            <th class="px-4 py-3 text-center">Tanggal Kembali</th>
                            <th class="px-4 py-3">Status</th> 
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Peminjamen as $peminjaman)
                            <tr class="border-t hover:bg-gray-200">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-medium text-indigo-600">{{ $peminjaman->Nama_Anggota }}</td>
                                <td class="py-3 px-4">{{ $peminjaman->Judul_Buku }}</td>
                                <td class="py-3 px-4 text-center">{{ $peminjaman->Tanggal_Pinjam }}</td>
                                <td class="py-3 px-4 text-center">{{ $peminjaman->Tanggal_Pengembalian }}</td>
                                {{-- <td class="py-3 px-4">{{ $peminjaman->Status }}</td> --}}
                                <td class="py-4 px-4">
                                    @if ($peminjaman->Status == 'Dipinjam')
                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">Dipinjam</span>
                                    @elseif ($peminjaman->Status == 'Selesai')
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Selesai</span>
                                    @else()
                                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm"></span>                                   
                                    @endif
                                </td>   
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('Peminjaman.edit', $peminjaman->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow">
                                            <i data-feather="edit-3"></i> Edit
                                        </a>
                                        <form action="{{ route('Peminjaman.destroy', $peminjaman->id) }}" method="POST"
                                            class="form-hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded btn-hapus flex items-center gap-1 shadow">
                                                <i data-feather="trash-2"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ url('/') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Beranda
                </a>

                <a href="{{ route('Anggota.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Kelola Buku
                </a>

                <a href="{{ route('Peminjaman.index') }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Kelola Anggota
                </a>
            </div>
        </main>
        
        <script>
            feather.replace();
        </script>

        <!-- Footer -->
        {{-- <footer class="bg-gray-900 text-gray-400 text-center py-4 mt-10">
            © 2025 <span class="text-blue-400 font-semibold">Perpustakaan Mini</span> • Dibuat dengan Laravel & Tailwind CSS
        </footer> --}}
    @endsection

    {{-- notif js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hapusButtons = document.querySelectorAll('.btn-hapus');

            hapusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form'); // ✅ langsung ambil form terdekat

                    Swal.fire({
                        title: 'Yakin hapus data?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // ✅ sekarang submit jalan
                        }
                    });
                });
            });
        });
    </script>
