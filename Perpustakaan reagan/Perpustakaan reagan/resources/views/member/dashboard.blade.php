@extends('layouts.member')

@section('title', 'Dashboard Member')

@section('content')
<div class="py-12 max-w-5xl mx-auto px-8">

    <!-- Hero Section -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-10 mb-14">
        <h2 class="text-3xl font-bold text-gray-800 leading-snug">
            👋 Halo, {{ auth()->user()->name }}!
        </h2>
        <p class="mt-4 text-gray-600 text-lg leading-relaxed">
            <span class="font-medium">NIS:</span> {{ auth()->user()->nis }} <br>
            <span class="font-medium">Jurusan:</span> {{ auth()->user()->jurusan }} <br>
            <span class="font-medium">Kelas:</span> {{ auth()->user()->kelas }}
        </p>
    </div>

    <!-- Action Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-16">
        @foreach([
            ['📖 Peminjaman Buku', 'Ajukan peminjaman buku untuk kebutuhan belajar.', 'member.borrow.index', 'border-blue-500 text-blue-600 hover:bg-blue-600 hover:text-white'],
            ['🔄 Pengembalian Buku', 'Laporkan pengembalian buku tepat waktu.', 'member.return.index', 'border-green-500 text-green-600 hover:bg-green-600 hover:text-white']
        ] as $action)
        <div class="p-8 border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition duration-300">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $action[0] }}</h3>
            <p class="text-gray-600 text-lg leading-relaxed mb-6">{{ $action[1] }}</p>
            <a href="{{ route($action[2]) }}" 
               class="px-6 py-3 border {{ $action[3] }} font-semibold rounded-md transition duration-300">
                Lihat Detail
            </a>
        </div>
        @endforeach
    </div>

    <!-- Peminjaman Aktif -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-10">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">📌 Peminjaman Aktif</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-gray-800">
                <thead class="bg-gray-50 text-left">
                    <tr>
                        @foreach(['ID Transaksi', 'Buku', 'Tanggal Pinjam', 'Status'] as $header)
                            <th class="border-b border-gray-300 px-6 py-4 font-medium text-lg">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse($activeTransactions as $borrowing)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-lg">#{{ $borrowing->id }}</td>
                            <td class="px-6 py-4 text-lg">{{ $borrowing->book->judul }} ({{ $borrowing->book->book_code }})</td>
                            <td class="px-6 py-4 text-lg">{{ $borrowing->borrow_date->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColor = match ($borrowing->status) {
                                        'Dipinjam' => 'bg-yellow-100 text-yellow-800',
                                        'Terlambat' => 'bg-red-100 text-red-800',
                                        'Dikembalikan' => 'bg-green-100 text-green-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-4 py-2 text-lg font-semibold rounded-md {{ $statusColor }}">{{ $borrowing->status }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 text-lg">🚫 Tidak ada peminjaman aktif saat ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
