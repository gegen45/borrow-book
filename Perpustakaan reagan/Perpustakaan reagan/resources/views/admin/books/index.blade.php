<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom hover effect for the table rows */
        .hover-scale:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Kelola Data Buku</h1>

        <!-- Action Buttons -->
        <div class="flex space-x-4 mb-6">
            <a href="{{ route('admin.books.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Tambah Buku</a>
            <a href="{{ route('admin.dashboard') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition duration-300">Kembali</a>
        </div>

        <!-- Success and Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Kode Buku</th>
                            <th class="py-3 px-4 text-left">Judul</th>
                            <th class="py-3 px-4 text-left">Pengarang</th>
                            <th class="py-3 px-4 text-left">Penerbit</th>
                            <th class="py-3 px-4 text-left">Tahun</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($book as $index => $b)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-300">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">{{ $b->book_code }}</td>
                                <td class="py-3 px-4">{{ $b->judul }}</td>
                                <td class="py-3 px-4">{{ $b->pengarang }}</td>
                                <td class="py-3 px-4">{{ $b->penerbit }}</td>
                                <td class="py-3 px-4">{{ $b->year }}</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-green-200 text-green-800">
                                        {{ ucfirst($b->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.books.edit', $b->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                                        <form action="{{ route('admin.books.destroy', $b->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>