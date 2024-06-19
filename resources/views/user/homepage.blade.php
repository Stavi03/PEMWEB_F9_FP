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
                <p class="pb-2 mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, repudiandae autem
                    velit
                    et
                    odio numquam? Eveniet similique sequi expedita iusto, quasi mollitia dolor exercitationem quia culpa
                    doloribus debitis nesciunt, qui molestias. Non debitis libero dignissimos quod minus nihil doloribus?
                    Quasi
                    doloribus dicta quia quos placeat quisquam beatae nemo molestiae ut nostrum, id nam saepe! Unde mollitia
                    qui, ratione incidunt illo beatae officiis ad. Dolore, velit? Quas quibusdam a, hic accusantium
                    voluptatum,
                    id, omnis neque quod voluptatem maxime dolorum deserunt ipsum dolore sapiente necessitatibus doloribus
                    reprehenderit beatae quia non nemo quaerat ea nesciunt obcaecati! Sapiente, accusantium eos reiciendis
                    laborum similique reprehenderit.</p>
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
                        <th scope="col">Sampah Terkumpul (gram)</th>
                        <th scope="col">Hasil penjualan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sampah as $data)
                        <tr>
                            <td>{{ $data->Berat }}</td>
                            <td>{{ $data->Hasil }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @endforeach
                    {{-- @foreach ($users as $data)
                        <tr>
                            <td>{{ $data->sampah_tkmpls->Berat }}</td>
                            <td>{{ $data->sampah_tkmpls->hasil ?? 'Tidak ada nominal' }}</td>
                            <td>{{ $data->sampah_tkmpls->created_at }}</td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>
        </section>
    </main>


    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
