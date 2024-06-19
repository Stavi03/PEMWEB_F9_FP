@extends('admin.layout.main-admin')

@section('input')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style-user.css') }}">

    {{-- cdn sweetalert --}}
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css " rel="stylesheet">

    <main>
        <div class="container">
            <div class="py-5 text-center">
                {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72"
                    height="57"> --}}
                <h2>Input Data</h2>
            </div>

            <div class="row g-5 justify-content-center">

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Input Data</h4>


                    <form method="POST" action="{{ route('admin.input.store') }}">
                        @csrf
                        <div class="row g-3">

                            <div class="col-sm-12">
                                <label for="user" class="form-label">User</label>
                                <div class="input-group">
                                    <select class="form-select" id="user" name="user" required>
                                        <option value="">Pilih User</option>
                                        @foreach ($users as $id => $nama)
                                            <option value="{{ $id }}" {{ old('user') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <!-- Pilihan bulan -->
                            <div class="col-sm-12">
                                <label for="bulan" class="form-label">Pilihan Bulan</label>
                                <select class="form-select" id="bulan" name="bulan" required value="{{ old('bulan') }}">
                                    <option value="">Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih bulan dengan benar.
                                </div>
                            </div>

                            <!-- berat -->
                            <div class="col-sm-12">
                                <label for="berat" class="form-label">Berat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="Berat" name="Berat" required
                                    placeholder="Masukan berat sampah" value="{{ old('Berat') }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Gram.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Nominal Pembayaran -->
                            <div class="col-sm-12">
                                <label for="nominal" class="form-label">Nominal Pembayaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" id="Hasil" name="Hasil" required
                                    onkeyup="formatRupiah(this)"  placeholder="Masukan nominal Hasil" value="{{ old('Hasil') }}">
                                </div>
                                <div class="invalid-feedback">
                                    Masukan nominal Hasil.
                                </div>
                            </div>


                            <hr class="my-4">

                            <!-- Tombol Bayar -->
                            <button class="w-100 btn btn-lg" type="submit">Input Data</button>
                            {{-- sweet alert --}}
                            @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        title: "Berhasil!",
                                        icon: "success"
                                    });
                                </script>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </main>



    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
