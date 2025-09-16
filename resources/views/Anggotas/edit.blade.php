@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Anggota</h1>

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

    <form action="{{ route('Anggota.update', $Anggota) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nama</label>
            <input type="text" name="Nama" value="{{ old('Nama', $Anggota->Nama) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="text" name="Email" value="{{ old('Email', $Anggota->Email) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Telp</label>
            <input type="number" name="Telp" value="{{ old('Telp', $Anggota->Telp) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" 
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
