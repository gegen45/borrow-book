<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for hover effects */
        .hover-scale:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Transaksi</h1>
            <div class="space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Kembali</a>
                <a href="{{ route('admin.transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Tambah Transaksi</a>
            </div>
        </div>

        <!-- Success and Info Messages -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('newTransaction'))
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
                <p>Transaksi baru berhasil ditambahkan!</p>
                <p><strong>ID Transaksi:</strong> {{ session('newTransaction')->id }}</p>
                <p><strong>Buku:</strong> {{ session('newTransaction')->book->judul }}</p>
            </div>
        @endif

        <!-- Transaction Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Nama Anggota</th>
                            <th class="py-3 px-4 text-left">Buku</th>
                            <th class="py-3 px-4 text-left">Tanggal Pinjam</th>
                            <th class="py-3 px-4 text-left">Tanggal Kembali</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($transactions as $transaction)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-300">
                                <td class="py-3 px-4">{{ $transaction->id }}</td>
                                <td class="py-3 px-4">{{ $transaction->user->name }}</td>
                                <td class="py-3 px-4">{{ $transaction->book->judul }}</td>
                                <td class="py-3 px-4">{{ $transaction->borrow_date }}</td>
                                <td class="py-3 px-4">{{ $transaction->return_date }}</td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                                        {{ $transaction->status === 'completed' ? 'bg-green-200 text-green-800' : 
                                           ($transaction->status === 'ongoing' ? 'bg-blue-200 text-blue-800' : 'bg-yellow-200 text-yellow-800') }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.transactions.show', $transaction) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition duration-300">Detail</a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
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