@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Peminjaman</h1>

    {{-- Tampilkan error validasi --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Update --}}
    <form action="{{ route('Peminjaman.update', $Peminjaman->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')  

        <div>
            <label class="block font-semibold">Nama Anggota</label>
            <input type="text" name="Nama_Anggota" 
                   value="{{ old('Nama_Anggota', $Peminjaman->Nama_Anggota) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Judul Buku</label>
            <input type="text" name="Judul_Buku" 
                   value="{{ old('Judul_Buku', $Peminjaman->Judul_Buku) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Pinjam</label>
            <input type="date" name="Tanggal_Pinjam" 
                   value="{{ old('Tanggal_Pinjam', $Peminjaman->Tanggal_Pinjam) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal Pengembalian</label>
            <input type="date" name="Tanggal_Pengembalian" 
                   value="{{ old('Tanggal_Pengembalian', $Peminjaman->Tanggal_Pengembalian) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="Status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="Status" id="Status"
                class="mt-1 bg-yellow-400 hover:bg-yellow-500 w-30 h-10 rounded-lg text-white text-center">
                <option value="Dipinjam" {{ old('Status', $Peminjaman->Status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Selesai" {{ old('Status', $Peminjaman->Status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
