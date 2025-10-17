@extends('layout.app')

@section('content')
    <h2 class="mb-4">Buat Mata Kuliah Baru</h2>


    <form action="{{ route('matakuliah.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
            <input
                type="text"
                name="nama_mk"
                id="nama_mk"
                class="form-control"
                placeholder="Masukkan nama mata kuliah"
                required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input
                type="number"
                name="sks"
                id="sks"
                class="form-control"
                placeholder="Masukkan jumlah SKS"
                min="1"
                max="3"
                required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </form>

@endsection
