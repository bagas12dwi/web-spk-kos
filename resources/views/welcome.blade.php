@extends('layouts.main')

@section('konten')
    <div class="container">
        <h1 class="text-center">Fuzzy Kost</h1>
        <div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="jarak" class="form-label">Jarak</label>
                        <input type="number" class="form-control" name="jarak" id="jarak" aria-describedby="helpJarak"
                            placeholder="0" />
                        <small id="helpJarak" class="form-text text-muted">Masukkan Jarak Dalam Satuan meter (m)</small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="mb-3">
                        <label for="kamar" class="form-label">Ukuran Kamar</label>
                        <input type="number" class="form-control" name="kamar" id="kamar"
                            aria-describedby="helpUkuran" placeholder="0" />
                        <small id="helpUkuran" class="form-text text-muted">Masukkan Ukuran Kamar Dalam Satuan Meter Persegi
                            (m2)</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fasilitas</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="Kasur" />
                        <label class="form-check-label" for="">Kasur</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="WIFI" />
                        <label class="form-check-label" for="">WIFI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="TV" />
                        <label class="form-check-label" for="">TV</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="Listrik" />
                        <label class="form-check-label" for="">Listrik</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="Lemari" />
                        <label class="form-check-label" for="">Lemari</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="Meja" />
                        <label class="form-check-label" for="">Meja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="Kursi" />
                        <label class="form-check-label" for="">Kursi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas" value="AC" />
                        <label class="form-check-label" for="">AC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fasilitas" name="fasilitas"
                            value="Kamar Mandi" />
                        <label class="form-check-label" for="">Kamar Mandi</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="proses">Cari</button>
        </div>
        <div class="mb-3">
            <label for="hasil" class="form-label">Z</label>
            <input type="number" class="form-control" name="hasil" id="hasil" aria-describedby="helpId"
                placeholder="" />
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $(function() {
            const rangeFasilitas = @json($range_fasilitas);
            const rangeJarak = @json($range_jarak);
            const rangeUkuran = @json($range_ukuran);
            const rangeHarga = @json($range_harga);
            var alfa = new Array(15);
            var z = new Array(15);
            var jarak = 0;
            var ukuran = 0;
            let fasilitas = 0;
            $('input[name="fasilitas"]:checked').each(function() {
                fasilitas++;
            });

            // $('#hasil').val("Rp " + prediksiHarga() + ".000,00");
            // console.log(rangeFasilitas);


            $('#proses').click(function() {
                jarak = $('#jarak').val();
                ukuran = $('#kamar').val();
                $('input[name="fasilitas"]:checked').each(function() {
                    fasilitas++;
                });

                prediksiHarga();

            });

            function findMin(x, y, z) {
                return Math.min(x, y, z);
            }

            function findRangeFasilitas(subcategory) {
                return rangeFasilitas.find(item => item.subcategory === subcategory);
            }

            function findRangeJarak(subcategory) {
                return rangeJarak.find(item => item.subcategory === subcategory);
            }

            function findRangeUkuran(subcategory) {
                return rangeUkuran.find(item => item.subcategory === subcategory);
            }

            function findRangeHarga(subcategory) {
                return rangeHarga.find(item => item.subcategory === subcategory);
            }

            function fasilitasBiasa() {
                const rangeBiasa = findRangeFasilitas('Biasa');
                if (rangeBiasa) {
                    if (rangeBiasa.lower_limit >= fasilitas) {
                        return 0;
                    } else if (fasilitas => rangeBiasa.lower_limit && fasilitas < rangeBiasa.upper_limit) {
                        return parseFloat(((rangeBiasa.upper_limit - fasilitas) / (rangeBiasa.upper_limit -
                            rangeBiasa.lower_limit)).toFixed(2));
                    } else {
                        return 1;
                    }
                }
            }

            function fasilitasLengkap() {
                const rangeLengkap = findRangeFasilitas('Lengkap');
                if (fasilitas >= rangeLengkap.upper_limit) {
                    return 1;
                } else if (fasilitas > rangeLengkap.lower_limit && fasilitas < rangeLengkap.upper_limit) {
                    return parseFloat(((fasilitas - rangeLengkap.lower_limit) / (rangeLengkap.upper_limit -
                        rangeLengkap.lower_limit)).toFixed(2));
                } else {
                    return 0;
                }
            }


            function jarakDekat() {
                const rangeDekat = findRangeJarak('Dekat');
                if (jarak >= rangeDekat.upper_limit) {
                    return 0;
                } else if (rangeDekat.lower_limit <= jarak && jarak <= rangeDekat.upper_limit) {
                    return parseFloat(((rangeDekat.upper_limit - jarak) / (rangeDekat.upper_limit - rangeDekat
                        .lower_limit)).toFixed(2));
                } else {
                    return 1;
                }

            }

            function jarakSedang() {
                const rangeSedang = findRangeJarak('Sedang');
                const rangeDekat = findRangeJarak('Dekat');
                if (rangeSedang.lower_limit <= jarak && jarak <= rangeDekat.upper_limit) {
                    return parseFloat(((jarak - rangeSedang.lower_limit) / (rangeDekat.upper_limit - rangeSedang
                        .lower_limit)).toFixed(2));
                } else if (rangeDekat.upper_limit <= jarak && jarak <= rangeSedang.upper_limit) {
                    return parseFloat(((rangeSedang.upper_limit - jarakDekat) / (rangeSedang.upper_limit -
                        rangeDekat.upper_limit)).toFixed(2));
                } else {
                    return 0;
                }
            }

            function jarakJauh() {
                const rangeJauh = findRangeJarak('Jauh');
                if (jarak >= rangeJauh.upper_limit) {
                    return 1;
                } else if (rangeJauh.lower_limit <= jarak && jarak <= rangeJauh.upper_limit) {
                    return parseFloat(((jarak - rangeJauh.lower_limit) / (rangeJauh.upper_limit - rangeJauh
                        .lower_limit)).toFixed(2));
                } else {
                    return 0;
                }
            }

            function ukuranSempit() {
                const rangeKecil = findRangeUkuran('Kecil');
                if (ukuran >= rangeKecil.upper_limit) {
                    return 0;
                } else if (rangeKecil.lower_limit <= ukuran && ukuran <= rangeKecil.upper_limit) {
                    return parseFloat(((rangeKecil.upper_limit - ukuran) / (rangeKecil.upper_limit - rangeKecil
                        .lower_limit)).toFixed(2));
                } else {
                    return 1;
                }
            }

            function ukuranSedang() {
                const rangeSedang = findRangeUkuran('Sedang');
                const rangeKecil = findRangeUkuran('Kecil');

                if (rangeSedang.lower_limit <= ukuran && ukuran <= rangeKecil.upper_limit) {
                    return parseFloat(((ukuran - rangeSedang.lower_limit) / (rangeKecil.upper_limit - rangeSedang
                        .lower_limit)).toFixed(2));
                } else if (rangeKecil.upper_limit <= ukuran && ukuran <= rangeSedang.upper_limit) {
                    return parseFloat(((rangeSedang.upper_limit - ukuran) / (rangeSedang.upper_limit - rangeKecil
                        .upper_limit)).toFixed(2));
                } else {
                    return 0;
                }
            }

            function ukuranLuas() {
                const rangeBesar = findRangeUkuran('Besar');
                if (ukuran >= rangeBesar.upper_limit) {
                    return 1;
                } else if (rangeBesar.lower_limit <= ukuran && ukuran <= rangeBesar.upper_limit) {
                    return parseFloat(((ukuran - rangeBesar.lower_limit) / (rangeBesar.upper_limit - rangeBesar
                        .lower_limit)).toFixed(2));
                } else {
                    return 0;
                }
            }

            function hargaMurah(alfa) {
                const rangeMurah = findRangeHarga('Murah');
                return (alfa * (rangeMurah.upper_limit - rangeMurah.lower_limit) + rangeMurah
                    .upper_limit);
            }

            function hargaMahal(alfa) {
                const rangeMahal = findRangeHarga('Mahal');
                return (alfa * (rangeMahal.upper_limit - rangeMahal.lower_limit) + rangeMahal
                    .lower_limit);
            }

            function aturan() {
                alfa[0] = findMin(fasilitasBiasa(), ukuranSempit(), jarakDekat());
                z[0] = hargaMurah(alfa[0]);

                alfa[1] = findMin(fasilitasBiasa(), ukuranSedang(), jarakDekat());
                z[1] = hargaMurah(alfa[1]);

                alfa[2] = findMin(fasilitasBiasa(), ukuranLuas(), jarakDekat());
                z[2] = hargaMahal(alfa[2]);

                alfa[3] = findMin(fasilitasLengkap(), ukuranLuas(), jarakDekat());
                z[3] = hargaMahal(alfa[3]);

                alfa[4] = findMin(fasilitasLengkap(), ukuranSedang(), jarakDekat());
                z[4] = hargaMahal(alfa[4]);

                alfa[5] = findMin(fasilitasBiasa(), ukuranSempit(), jarakSedang());
                z[5] = hargaMurah(alfa[5]);

                alfa[6] = findMin(fasilitasBiasa(), ukuranSedang(), jarakSedang());
                z[6] = hargaMurah(alfa[6]);

                alfa[7] = findMin(fasilitasBiasa(), ukuranLuas(), jarakSedang());
                z[7] = hargaMurah(alfa[7]);

                alfa[8] = findMin(fasilitasLengkap(), ukuranSedang(), jarakSedang());
                z[8] = hargaMahal(alfa[8]);

                alfa[9] = findMin(fasilitasLengkap(), ukuranLuas(), jarakSedang());
                z[9] = hargaMahal(alfa[9]);

                alfa[10] = findMin(fasilitasBiasa(), ukuranSempit(), jarakJauh());
                z[10] = hargaMurah(alfa[10]);

                alfa[11] = findMin(fasilitasBiasa(), ukuranSedang(), jarakJauh());
                z[11] = hargaMurah(alfa[11]);

                alfa[12] = findMin(fasilitasBiasa(), ukuranLuas(), jarakJauh());
                z[12] = hargaMurah(alfa[12]);

                alfa[13] = findMin(fasilitasLengkap(), ukuranSedang(), jarakJauh());
                z[13] = hargaMahal(alfa[13]);

                alfa[14] = findMin(fasilitasLengkap(), ukuranLuas(), jarakJauh());
                z[14] = hargaMahal(alfa[14]);

            }

            function defuzzyfikasi() {
                var temp1 = 0,
                    temp2 = 0;
                for (let i = 0; i < 15; i++) {
                    temp1 += alfa[i] * z[i];
                    temp2 += alfa[i];
                    console.log('alfa[' + i + '] ' + alfa[i]);
                    console.log('z[' + i + '] ' + z[i]);

                }

                $('#hasil').val(Math.round(temp1 / temp2));
                return Math.round(temp1 / temp2);
            }

            function prediksiHarga() {
                aturan();
                defuzzyfikasi();
            }
        });
    </script>
@endpush
