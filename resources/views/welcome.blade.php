@extends('layouts.main')

@section('konten')
    <div class="container">
        <div class="row d-flex align-items-center">
            <div
                class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-center text-center justify-content-center">
                <h2 class="text-primary fw-bold">CostKost</h2>
                <p>Hitung harga kos yang kamu cari dengan mudah dan dapatkan rekomendasi</p>
                <a href="{{ route('hitung') }}" class="btn btn-primary">Coba Sekarang</a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="text-end">
                    <img src="{{ URL::asset('assets/img/bg.jpg') }}" alt="bg kost" style="max-width: 23em; object-fit: cover"
                        class="rounded">
                </div>
            </div>
        </div>
    </div>
@endsection
