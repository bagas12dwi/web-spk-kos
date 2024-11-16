@extends('layouts.main')

@section('konten')
    <div class="container">
        <h2 class="mb-3">Tambah Kost</h2>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('kost.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kost</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName"
                    placeholder="Masukkan nama kost" />
                <small id="helpName" class="form-text text-muted">Masukkan nama kost</small>
            </div>
            <div class="mb-3">
                <label for="distance" class="form-label">Jarak (m)</label>
                <input type="number" class="form-control" name="distance" id="distance" aria-describedby="helpDistance"
                    placeholder="Masukkan jarak kost dari unair" />
                <small id="helpDistance" class="form-text text-muted">Masukkan jarak kost dalam satuan meter</small>
            </div>
            <div class="mb-3">
                <label for="wide" class="form-label">Luas Kost (m2)</label>
                <input type="number" class="form-control" name="wide" id="wide" aria-describedby="helpWide"
                    placeholder="Masukkan luas kost" />
                <small id="helpWide" class="form-text text-muted">Masukkan luas kost dalam satuan m2</small>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga Kost</label>
                <input type="number" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                    placeholder="Masukkan harga kost" />
                <small id="helpPrice" class="form-text text-muted">Masukkan harga kost</small>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Foto Kost</label>
                <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Upload gambar kost"
                    aria-describedby="fileHelpImgpath" />
                <div id="fileHelpImgpath" class="form-text">Upload foto kost</div>
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="Kasur" />
                    <label class="form-check-label" for="">Kasur</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="WIFI" />
                    <label class="form-check-label" for="">WIFI</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="TV" />
                    <label class="form-check-label" for="">TV</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="Listrik" />
                    <label class="form-check-label" for="">Listrik</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="Lemari" />
                    <label class="form-check-label" for="">Lemari</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="Meja" />
                    <label class="form-check-label" for="">Meja</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="Kursi" />
                    <label class="form-check-label" for="">Kursi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]" value="AC" />
                    <label class="form-check-label" for="">AC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="facility[]" name="facility[]"
                        value="Kamar Mandi" />
                    <label class="form-check-label" for="">Kamar Mandi Dalam</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="map" class="form-label">Map</label>
                <textarea class="form-control" name="map" id="map" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <div class="row gap-2 my-4">
            @forelse ($kosts as $kost)
                <div class="col-4 col-md-4 col-sm-6 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $kost->img_path != null ? URL::asset('storage/' . $kost->img_path) : URL::asset('assets/img/no-img.svg') }}"
                            class="card-img-top" alt="Foto Kost" style="height: 15em; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kost->name }}</h5>
                            <h6 class="card-text">Rp. {{ number_format($kost->price, 2, ',', '.') }}</h6>
                            <p class="card-text">{{ $kost->facility }}</p>
                            <a href="#" class="btn btn-success">Lihat kost</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    Tidak ada data kost
                </div>
            @endforelse
        </div>
    </div>
@endsection
