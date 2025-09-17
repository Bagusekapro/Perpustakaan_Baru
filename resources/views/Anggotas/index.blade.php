@extends('layouts.app')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])



@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    showConfirmButton: false,
    timer: 1500,
    customClass:{
      popup:'swal-sm',
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
    font-size: 0.8rem !important; /* perkecil teks */
    width: 22em !important;       /* perkecil lebar box */
    padding: 1em !important;
}

.swal2-title.swal-title-sm {
    font-size: 1.1rem !important; /* judul lebih kecil */
}

.swal2-html-container.swal-text-sm {
    font-size: 0.9rem !important; /* isi teks lebih kecil */
}

</style>


@endif

  <!-- Hero Section -->
  <section class=" w-full bg-gradient-to-r from-indigo-500 to-blue-600 text-white text-center py-10 ">
    <h2 class="text-3xl font-bold">📖 Daftar Anggota</h2>
    <p class="mt-2 text-lg">Kelola daftar anggota perpustakaan</p>
  </section>

  <!-- Konten Utama -->
  <main class="container mx-auto px-10 py-10 flex-grow">
    <!-- Tombol Tambah -->
    <div class="flex justify-end mb-6">
      <a href="{{ route('Anggota.create') }}"
         class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
         ➕ Tambah Anggota
      </a>
    </div>

    <!-- Tabel Anggota -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-indigo-600 text-white text-left">
            <th class="py-3 px-4 rounded-tl-xl">#</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4  ">Email</th>
            <th class="py-3 px-4 text-center">Telp</th>
            <th class="py-3 px-4 rounded-tr-xl text-center w-40">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Anggotas as $anggota)
          <tr class="border-t hover:bg-gray-200">
            <td class="py-3 px-4">{{ $loop->iteration }}</td>
            <td class="py-3 px-4 font-medium text-indigo-600">{{ $anggota->Nama }}</td>
            <td class="py-3 px-4 ">{{ $anggota->Email }}</td>
            <td class="py-3 px-4 text-center">{{ $anggota->Telp }}</td>
            <td class="py-3 px-4 text-center flex justify-center gap-2">

              <a href="{{ route('Anggota.edit', $anggota->id) }}"
                 class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow">
                 <i data-feather="edit-3"></i> Edit
              </a>
              <form action="{{ route('Anggota.destroy', $anggota->id) }}" method="POST" class="form-hapus">
                @csrf
                @method('DELETE')
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded btn-hapus flex items-center gap-1 shadow">
                  <i data-feather="trash-2" ></i>
                   Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-6 flex justify-center space-x-6">
    <a href="{{ url('/') }}" 
       class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow">
        Beranda
    </a>

    <a href="{{ route('Buku.index') }}" 
       class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow">
        Kelola Buku
    </a>

    <a href="{{ route('Peminjaman.index') }}" 
       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow">
        Kelola Peminjaman
    </a>
</div>

  </main>
  

  <script>
    feather.replace();
  </script>
@endsection



{{-- JS notif dan css --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hapusButtons = document.querySelectorAll('.btn-hapus');

    hapusButtons.forEach(button => {
        button.addEventListener('click', function () {
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

