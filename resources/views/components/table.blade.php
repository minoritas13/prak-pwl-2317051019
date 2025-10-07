@props(['title', 'users'])

<div>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">NPM</th>
                    <th class="px-4 py-2 text-left">Kelas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->nama }}</td>
                        <td class="px-4 py-2">{{ $user->npm }}</td>
                        <td class="px-4 py-2">{{ $user->nama_kelas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
