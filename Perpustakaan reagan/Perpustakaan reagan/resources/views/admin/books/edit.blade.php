<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
        <h2 class="text-center">Edit Buku</h2>

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="book_code" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="book_code" name="book_code" value="{{ $book->book_code }}" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $book->pengarang }}" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" {{ $book->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="borrowed" {{ $book->status == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="maintenance" {{ $book->status == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
