@props(['title', 'users'])

<div>
    <div class="overflow-x-auto">
        <table class="table table-bordered table-striped shadow-sm align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->nama_kelas ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
