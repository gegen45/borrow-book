<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <style>
        /* Efek Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.1);
        }

        /* Input */
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-field:focus,
        .input-field:not(:placeholder-shown) {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: cyan;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        /* Efek Glow pada Tombol */
        .btn-glow {
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
        }

        .btn-glow:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 191, 255, 0.8);
        }

        /* Animasi Gradient Background */
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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

    <!-- Background Image dengan Opacity -->
    <div class="absolute top-0 left-0 w-full h-full bg-[url('https://source.unsplash.com/random/?library,books')] bg-cover bg-center opacity-20"></div>

    <!-- Floating Circles untuk Efek Dinamis -->
    <div class="absolute top-0 left-0 w-full h-full z-0">
        <div class="absolute w-64 h-64 bg-purple-500 rounded-full opacity-20 blur-2xl top-1/4 left-1/4 animate-float"></div>
        <div class="absolute w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-2xl top-1/2 right-1/4 animate-float-delay"></div>
    </div>

    <!-- Form Login -->
    <div class="relative glass p-8 rounded-2xl shadow-2xl w-full max-w-md z-10 text-white transform transition-all duration-500 hover:scale-105">
        <h2 class="text-3xl font-bold text-center mb-6 bg-gradient-to-r from-purple-400 to-blue-500 bg-clip-text text-transparent">Login Perpustakaan</h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-300 mb-2">Username</label>
                <div class="relative">
                    <input type="text" name="username" class="input-field w-full p-3 pl-12 rounded-lg focus:ring-2 focus:ring-cyan-400" required placeholder="Masukkan username">
                    <span class="absolute left-4 top-3 text-cyan-300 text-lg">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" class="input-field w-full p-3 pl-12 rounded-lg focus:ring-2 focus:ring-cyan-400" required placeholder="Masukkan password">
                    <span class="absolute left-4 top-3 text-cyan-300 text-lg">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-500 text-white p-3 rounded-lg font-semibold btn-glow">
                Masuk 🔑
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-gray-300">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-cyan-300 font-semibold hover:text-cyan-400 transition-colors duration-300">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>