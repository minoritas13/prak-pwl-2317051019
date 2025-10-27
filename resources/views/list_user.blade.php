@extends('layout.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pengguna</h2>
        <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah Pengguna</a>
    </div>

    <x-table :title="$title" :users="$users" />
@endsection
