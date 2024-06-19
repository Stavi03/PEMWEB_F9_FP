@extends('user.layout.main-user')

@section('homepage')
    {{-- menampilkan navbar --}}
    @include('user.partials.navbar-user')

    <main>
        <section class="section d-flex justify-content-center align-items-center">
            <div class="section-container pb-3  mt-5">
                {{-- logic sapaan otomatis --}}
                @php
                    $jam = date('H');
                    if ($jam < '12') {
                        echo '<h2>Selamat Siang: ' . Auth::user()->nama . ' </h2>';
                    } elseif ($jam < '18') {
                        echo '<h2>Selamat Malam: ' . Auth::user()->nama . ' </h2>';
                    } else {
                        echo '<h2>Selamat Pagi: ' . Auth::user()->nama . ' </h2>';
                    }
                @endphp
                <p class="pb-2 mt-4">selamat datang di website LimbahKu Driyo redjo dimana kamu dapat melihat data sampah
                    yang terkumpul dengan transparant!!</p>
            </div>
        </section>

        {{-- tagihan --}}
        <section class="section justify-content-center align-items-center">
            <div class="section-container pb-3 d-flex flex-column align-items-start text-start mt-5">
                <h2> Riwayat Pembayaran</h2>
            </div>
            <table class="table table-striped table-sm " style="back">
                <thead>
                    <tr>
                        <th scope="col">User_ID</th>
                        <th scope="col">Sampah Terkumpul (gram)</th>
                        <th scope="col">Hasil penjualan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sampah as $data)
                        <tr>
                            <td>{{ $data->user_id }}</td>
                            <td>{{ $data->Berat }} Gram</td>
                            <td>Rp.{{ $data->Hasil }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>


    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
