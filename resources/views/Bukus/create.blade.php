@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">➕ Tambah Buku Baru</h1>

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

    <form action="{{ route('Buku.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="Judul" value="{{ old('Judul') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Penulis</label>
            <input type="text" name="Penulis" value="{{ old('Penulis') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Tahun Terbit</label>
            <input type="year" name="Tahun_Terbit" value="{{ old('Tahun_Terbit') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Stok</label>
            <input type="number" name="Stok" value="{{ old('Stok') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Simpan
        </button>
    </form>
</div>
@endsection
