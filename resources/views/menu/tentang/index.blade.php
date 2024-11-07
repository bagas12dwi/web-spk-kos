@extends('layouts.main')

@section('konten')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h6 class="text-primary text-uppercase">Pelajari Lebih Lanjut</h6>
                <h2 class="fw-bold text-primary">Tentang Kami</h2>
                <p>CostKost merupakan aplikasi yang dapat membantu kalian dalam memperkirakan berapa biaya yang harus
                    dikeluarkan untuk menyewa sebuah kamar kos.
                </p>
                <p>
                    Aplikasi ini juga menampilkan rekomendasi kos, sesuai dengan harga akhir yang ditampilkan. Sehingga,
                    mempermudah para pendatang untuk menyiapkan perkiraan biaya untuk menyewa kamar kos.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ URL::asset('assets/img/logo.png') }}" alt="" class="border border-3 rounded-4">
            </div>
        </div>
    </div>
@endsection
