<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav class="w-1/6 bg-gradient-to-b from-blue-900 to-blue-700 text-white px-4 py-6">
            <h5 class="text-center text-lg font-semibold uppercase tracking-wide">Admin</h5>
            <ul class="mt-6 space-y-3">
                <li><a class="flex items-center space-x-2 p-2 rounded-lg hover:bg-blue-800 transition" href="/admin/dashboard">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a></li>
                <li><a class="flex items-center space-x-2 p-2 rounded-lg hover:bg-blue-800 transition" href="/admin/books">
                    <i class="fas fa-book"></i> <span>Kelola Buku</span>
                </a></li>
                <li><a class="flex items-center space-x-2 p-2 rounded-lg hover:bg-blue-800 transition" href="/admin/transactions">
                    <i class="fas fa-exchange-alt"></i> <span>Transaksi</span>
                </a></li>
                <li><a class="flex items-center space-x-2 p-2 rounded-lg hover:bg-blue-800 transition" href="/admin/users">
                    <i class="fas fa-users"></i> <span>Kelola Anggota</span>
                </a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="container mx-auto space-y-6">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">Hi, {{ auth()->user()->name }}</h1>
                    <form action="{{ route('logout') }}" method="POST" class="inline">@csrf
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</button>
                    </form>
                </div>

                <!-- Statistik Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                        <h5 class="text-gray-700 text-lg flex items-center"><i class="fas fa-book-open text-blue-500 mr-2"></i> Buku Tersedia</h5>
                        <p class="text-4xl font-bold text-gray-900 mt-2">{{ $availableVehicles }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                        <h5 class="text-gray-700 text-lg flex items-center"><i class="fas fa-exchange-alt text-green-500 mr-2"></i> Total Transaksi</h5>
                        <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalTransactions }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                        <h5 class="text-gray-700 text-lg flex items-center"><i class="fas fa-users text-yellow-500 mr-2"></i> Anggota Terdaftar</h5>
                        <p class="text-4xl font-bold text-gray-900 mt-2">{{ $registeredUsers }}</p>
                    </div>
                </div>

                <!-- Welcome Message -->
                <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 text-center">
                    <h5 class="text-xl font-semibold text-gray-800">Selamat Datang</h5>
                    <p class="text-gray-600 mt-2">Gunakan menu di sebelah kiri untuk mengelola sistem.</p>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
