@extends('layouts.main')


@section('konten')
    <div class="container">
        <div class="info-kost">
            <div class="row align-items-start">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{ $kost->img_path != null ? URL::asset('storage/' . $kost->img_path) : URL::asset('assets/img/no-img.svg') }}"
                        style="height: 30em; width: 30em; object-fit: cover;" alt="Foto Kost">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="fw-bold">{{ $kost->name }}</h3>
                    <h4 class="fw-semibold">Rp. {{ number_format($kost->price, 2, ',', '.') }}</h4>
                    <h6>{{ $kost->facility }}</h6>
                    <p>{{ $kost->address }}</p>
                </div>
            </div>
        </div>
        <div class="map my-4">
            <h4 class="fw-semibold">Lokasi Kost</h4>
            <hr>
            {!! $kost->map !!}
        </div>
    </div>
@endsection
