<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-700 to-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">

                <!-- Logo & Links -->
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-extrabold tracking-wide">📚 Peminjaman Buku</h1>
                    <div class="hidden md:flex space-x-6 text-lg">
                        <a href="{{ route('member.dashboard') }}" class="hover:text-gray-300 transition duration-300">Dashboard</a>
                        <a href="{{ route('member.borrow.index') }}" class="hover:text-gray-300 transition duration-300">Peminjaman</a>
                        <a href="{{ route('member.return.index') }}" class="hover:text-gray-300 transition duration-300">Pengembalian</a>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2 bg-white text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        <span>👤 {{ Auth::user()->name ?? 'User' }}</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg hidden">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-red-100 transition text-red-600">Logout</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-10 max-w-6xl mx-auto px-6">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-md shadow-md transition-opacity duration-300">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="fixed bottom-4 right-4 bg-red-600 text-white px-6 py-3 rounded-md shadow-md transition-opacity duration-300">
        {{ session('error') }}
    </div>
    @endif

</body>
</html>
