@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Mobil</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-full max-w-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Merk</label>
            <input name="merk" value="{{ old('merk') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Model</label>
            <input name="model" value="{{ old('model') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Warna</label>
            <input name="color" value="{{ old('color') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tahun</label>
            <input type="number" name="year" value="{{ old('year') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Gambar (opsional)</label>
            <input type="file" name="image" class="w-full">
        </div>
        <button class="bg-dark-500 text-dark px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
