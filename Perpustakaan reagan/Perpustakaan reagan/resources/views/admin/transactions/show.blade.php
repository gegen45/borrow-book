<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom hover effect for the card */
        .hover-scale:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
            <!-- Card Header -->
            <div class="bg-gray-800 text-white px-6 py-4">
                <h3 class="text-2xl font-semibold">Detail Transaksi #{{ $transaction->id }}</h3>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <!-- Informasi Anggota dan Buku -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Informasi Anggota -->
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h5 class="text-lg font-semibold text-gray-800 mb-4">Informasi Anggota</h5>
                        <div class="space-y-2">
                            <p><strong class="text-gray-700">Nama:</strong> {{ $transaction->user->name }}</p>
                            <p><strong class="text-gray-700">NIS:</strong> {{ $transaction->user->nis }}</p>
                            <p><strong class="text-gray-700">Jurusan:</strong> {{ $transaction->user->jurusan }}</p>
                            <p><strong class="text-gray-700">Kelas:</strong> {{ $transaction->user->kelas }}</p>
                        </div>
                    </div>

                    <!-- Informasi Buku -->
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h5 class="text-lg font-semibold text-gray-800 mb-4">Informasi Buku</h5>
                        <div class="space-y-2">
                            <p><strong class="text-gray-700">Judul:</strong> {{ $transaction->book->judul }}</p>
                            <p><strong class="text-gray-700">Pengarang:</strong> {{ $transaction->book->pengarang }}</p>
                            <p><strong class="text-gray-700">Kategori:</strong> {{ $transaction->book->penerbit }}</p>
                            <p><strong class="text-gray-700">Status:</strong>
                                <span class="inline-block px-2 py-1 rounded-full text-sm font-semibold {{ $transaction->book->status === 'available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                    {{ ucfirst($transaction->book->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Transaksi -->
                <div class="bg-gray-100 p-6 rounded-lg mb-8">
                    <h5 class="text-lg font-semibold text-gray-800 mb-4">Informasi Transaksi</h5>
                    <div class="space-y-2">
                        <p><strong class="text-gray-700">Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($transaction->borrow_date)->format('d-m-Y H:i') }}</p>
                        <p><strong class="text-gray-700">Tanggal Kembali:</strong> {{ \Carbon\Carbon::parse($transaction->return_date)->format('d-m-Y H:i') }}</p>
                        <p><strong class="text-gray-700">Status:</strong>
                            <span class="inline-block px-2 py-1 rounded-full text-sm font-semibold {{ $transaction->status === 'completed' ? 'bg-green-200 text-green-800' : ($transaction->status === 'ongoing' ? 'bg-blue-200 text-blue-800' : 'bg-yellow-200 text-yellow-800') }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Form Update Status -->
                <form action="{{ route('admin.transactions.update', $transaction) }}" method="POST" class="mb-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="ongoing" {{ $transaction->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ $transaction->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="w-full md:w-auto bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Update Status</button>
                        </div>
                    </div>
                </form>

                <!-- Tombol Kembali -->
                <div class="flex justify-end">
                    <a href="{{ route('admin.transactions.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>