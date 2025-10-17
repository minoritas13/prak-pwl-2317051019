@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Mata Kuliah</h2>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">+ Tambah Mata Kuliah</a>
    </div>

    <table class="table table-bordered table-striped shadow-sm align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mks as $mk)
                <tr>
                    <td>{{ $mk->id }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td class="text-center">
                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-warning me-1">
                            Edit
                        </a>
                        <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
