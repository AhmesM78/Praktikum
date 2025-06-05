@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Mobil</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-full max-w-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Merk</label>
            <input name="brand" value="{{ old('brand') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Model</label>
            <input name="model" value="{{ old('model') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tahun</label>
            <input type="number" name="year" value="{{ old('year') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Gambar (opsional)</label>
            <input type="file" name="image" class="w-full">
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
