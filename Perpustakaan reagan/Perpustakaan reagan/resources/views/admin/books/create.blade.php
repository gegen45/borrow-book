<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .card {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="card">
        <h2 class="text-center">Tambah Buku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_code" class="form-label">Kode Buku</label>
                <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" value="{{ old('book_code') }}" required>
                @error('book_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
                @error('pengarang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
                @error('penerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" required>
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="borrowed" {{ old('status') == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
