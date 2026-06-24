<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Tambah Transaksi Baru</h3>

        <!-- Error Handling -->
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.transactions.store') }}" method="POST">
            @csrf

            <!-- Anggota -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Anggota</label>
                <select name="user_id" class="w-full mt-2 p-2 border rounded focus:ring focus:ring-blue-300" required>
                    <option value="">Pilih Anggota</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->nis }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Buku -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Buku</label>
                <select name="book_id" class="w-full mt-2 p-2 border rounded focus:ring focus:ring-blue-300" required>
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pinjam -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Tanggal Pinjam</label>
                <input type="datetime-local" name="borrow_date" class="w-full mt-2 p-2 border rounded focus:ring focus:ring-blue-300" required value="{{ now()->format('Y-m-d\TH:i') }}">
            </div>

            <!-- Tanggal Kembali -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Tanggal Kembali</label>
                <input type="datetime-local" name="return_date" class="w-full mt-2 p-2 border rounded focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Status</label>
                <select name="status" class="w-full mt-2 p-2 border rounded focus:ring focus:ring-blue-300" required>
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between">
                <a href="{{ route('admin.transactions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Kembali</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
