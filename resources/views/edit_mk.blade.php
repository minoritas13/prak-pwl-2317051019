@extends('layout.app')

@section('content')
    <h2 class="mb-4">Edit Mata Kuliah</h2>

    <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
            <input
                type="text"
                name="nama_mk"
                id="nama_mk"
                class="form-control"
                value="{{ old('nama_mk', $mk->nama_mk) }}"
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
                value="{{ old('sks', $mk->sks) }}"
                placeholder="Masukkan jumlah SKS"
                min="1"
                max="3"
                required>
        </div>

        <button type="submit" class="btn btn-success w-100">Perbarui</button>
    </form>
@endsection
