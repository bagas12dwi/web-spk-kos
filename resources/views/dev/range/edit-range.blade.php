@extends('layouts.main')

@section('konten')
    <div class="container">
        <h2>Setting Range</h2>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('range.update', $range->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select form-select" name="category" id="category">
                    <option value="Jarak" {{ $range->category == 'Jarak' ? 'selected' : '' }}>Jarak</option>
                    <option value="Kamar" {{ $range->category == 'kamar' ? 'selected' : '' }}>Kamar</option>
                    <option value="Fasilitas" {{ $range->category == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                    <option value="Harga" {{ $range->category == 'Harga' ? 'selected' : '' }}>Harga</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="subcategory" class="form-label">Subkategori</label>
                <input type="text" class="form-control" name="subcategory" id="subcategory"
                    aria-describedby="helpSubCategory" placeholder="" value="{{ $range->subcategory }}" />
                <small id="helpSubCategory" class="form-text text-muted">Masukkan Subkategori</small>
            </div>
            <div class="mb-3">
                <label for="lower_limit" class="form-label">Batas Bawah</label>
                <input type="number" class="form-control" name="lower_limit" id="lower_limit" aria-describedby="helpLower"
                    placeholder="Masukkan batas bawah" value="{{ $range->lower_limit }}" />
                <small id="helpLower" class="form-text text-muted">Masukkan batas bawah</small>
            </div>
            <div class="mb-3">
                <label for="upper_limit" class="form-label">Batas Atas</label>
                <input type="number" class="form-control" name="upper_limit" id="upper_limit" aria-describedby="helpUpper"
                    placeholder="Masukkan batas atas" value="{{ $range->upper_limit }}" />
                <small id="helpUpper" class="form-text text-muted">Masukkan batas atas</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
