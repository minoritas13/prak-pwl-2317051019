@extends('layout.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Buat Pengguna Baru</h1>

    <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="nama" class="block text-gray-700 font-semibold mb-1">Nama</label>
            <input
                type="text"
                id="nama"
                name="nama"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama"
                required
            >
        </div>

        <div>
            <label for="npm" class="block text-gray-700 font-semibold mb-1">NPM</label>
            <input
                type="text"
                id="npm"
                name="npm"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan NPM"
                required
            >
        </div>

        <div>
            <label for="kelas_id" class="block text-gray-700 font-semibold mb-1">Kelas</label>
            <select
                name="kelas_id"
                id="kelas_id"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center">
            <button
                type="submit"
                class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Submit
            </button>
        </div>
    </form>
</div>

@endsection
