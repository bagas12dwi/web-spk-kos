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
        {{-- <form action="{{ route('range.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select form-select" name="category" id="category">
                    <option selected>Pilih Kategori</option>
                    <option value="Jarak">Jarak</option>
                    <option value="Kamar">Kamar</option>
                    <option value="Fasilitas">Fasilitas</option>
                    <option value="Harga">Harga</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="subcategory" class="form-label">Subkategori</label>
                <input type="text" class="form-control" name="subcategory" id="subcategory"
                    aria-describedby="helpSubCategory" placeholder="" />
                <small id="helpSubCategory" class="form-text text-muted">Masukkan Subkategori</small>
            </div>
            <div class="mb-3">
                <label for="lower_limit" class="form-label">Batas Bawah</label>
                <input type="number" class="form-control" name="lower_limit" id="lower_limit" aria-describedby="helpLower"
                    placeholder="Masukkan batas bawah" />
                <small id="helpLower" class="form-text text-muted">Masukkan batas bawah</small>
            </div>
            <div class="mb-3">
                <label for="upper_limit" class="form-label">Batas Atas</label>
                <input type="number" class="form-control" name="upper_limit" id="upper_limit" aria-describedby="helpUpper"
                    placeholder="Masukkan batas atas" />
                <small id="helpUpper" class="form-text text-muted">Masukkan batas atas</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form> --}}

        <div class="my-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Subkategori</th>
                        <th scope="col">Batas Bawah</th>
                        <th scope="col">Batas Atas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ranges as $range)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $range->category }}</td>
                            <td>{{ $range->subcategory }}</td>
                            <td>{{ $range->lower_limit }}</td>
                            <td>{{ $range->upper_limit }}</td>
                            <td>
                                <a href="{{ route('range.edit', $range->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
