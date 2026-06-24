<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-5">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Kelola Data Anggota</h2>
            <div>
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Tambah Anggota</a>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Kembali</a>
            </div>
        </div>

        <!-- Alert -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full border-collapse rounded-lg">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">NIS</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Kelas</th>
                        <th class="px-4 py-3 text-left">Jurusan</th>
                        <th class="px-4 py-3 text-left">Username</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach($users as $index => $user)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $user->nis }}</td>
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->kelas }}</td>
                            <td class="px-4 py-3">{{ $user->jurusan }}</td>
                            <td class="px-4 py-3">{{ $user->username }}</td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 text-white rounded-full text-sm font-semibold 
                                    {{ $user->role === 'admin' ? 'bg-green-600' : 'bg-blue-600' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 flex space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
