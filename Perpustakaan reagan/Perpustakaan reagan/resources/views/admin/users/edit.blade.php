<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-5">Edit Anggota</h2>

        <!-- Alert Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                <input type="text" id="nis" name="nis" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('nis', $user->nis) }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" id="kelas" name="kelas" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('kelas', $user->kelas) }}" required>
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                <select name="jurusan" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="" disabled>Pilih Jurusan</option>
                    <option value="RPL" {{ old('jurusan', $user->jurusan) == 'RPL' ? 'selected' : '' }}>RPL</option>
                    <option value="TKJ" {{ old('jurusan', $user->jurusan) == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                    <option value="TJA" {{ old('jurusan', $user->jurusan) == 'TJA' ? 'selected' : '' }}>TJA</option>
                    <option value="TR" {{ old('jurusan', $user->jurusan) == 'TR' ? 'selected' : '' }}>TR</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-700">Password (kosongkan jika tidak ingin diubah)</label>
                <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="member" {{ old('role', $user->role) == 'member' ? 'selected' : '' }}>Member</option>
                </select>
            </div>

            <div class="flex justify-between mt-5">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">Kembali</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
