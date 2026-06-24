<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Peminjaman Kendaraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi Gradient Background */
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 10s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Efek Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Input dan Select */
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: #3b82f6;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }

        /* Tombol dengan Gradient dan Glow */
        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.8);
        }

        /* Animasi Floating Circles */
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delay {
            animation: float 6s ease-in-out infinite 3s;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-800 flex items-center justify-center min-h-screen overflow-hidden relative animate-gradient">

    <!-- Floating Circles untuk Efek Dinamis -->
    <div class="absolute top-0 left-0 w-full h-full z-0">
        <div class="absolute w-48 h-48 bg-purple-500 rounded-full opacity-20 blur-2xl top-1/4 left-1/4 animate-float"></div>
        <div class="absolute w-48 h-48 bg-blue-500 rounded-full opacity-20 blur-2xl top-1/2 right-1/4 animate-float-delay"></div>
    </div>

    <!-- Register Box -->
    <div class="glass p-6 rounded-2xl shadow-2xl w-full max-w-sm z-10 text-white transform transition-all duration-500 hover:scale-105">
        <h2 class="text-2xl font-bold text-center mb-4 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
             Daftar Akun Baru
        </h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label class="block text-gray-300 mb-1">NIS</label>
                <input type="text" name="nis" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Masukkan NIS">
            </div>

            <div class="form-group">
                <label class="block text-gray-300 mb-1">Nama Lengkap</label>
                <input type="text" name="name" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Masukkan Nama Lengkap">
            </div>

            <div class="form-group">
                <label class="block text-gray-300 mb-1">Username</label>
                <input type="text" name="username" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Masukkan Username">
            </div>

            <div class="form-group">
                <label class="block text-gray-300 mb-1">Kelas</label>
                <input type="text" name="kelas" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Masukkan Kelas">
            </div>

            <div class="form-group">
                <label class="block text-gray-300 mb-1">Jurusan</label>
                <select name="jurusan" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400 text-white" required>
                    <option value="" selected disabled class="text-gray-500">Pilih Jurusan</option>
                    <option value="RPL" class="text-gray-900">RPL</option>
                    <option value="TKJ" class="text-gray-900">TKJ</option>
                    <option value="TJA" class="text-gray-900">TJA</option>
                    <option value="TR" class="text-gray-900">TR</option>
                </select>
            </div>

            <div class="form-group">
                <label class="block text-gray-300 mb-1">Password</label>
                <input type="password" name="password" class="input-field w-full p-2 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Minimal 6 karakter">
            </div>

            <button type="submit" class="btn-gradient w-full p-2 rounded-lg font-semibold">
                Daftar
            </button>

            <div class="text-center mt-4">
                <p class="text-gray-300 text-sm">Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-blue-300 font-semibold hover:text-blue-400 transition-colors duration-300">Masuk di sini</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
