<?php
$labels = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
?>

@extends('admin.layout.main-admin')
@section('tagihan')

    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    {{-- link chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <main>
        <div class="bulan">
            <h3 class="text-start mb-4 mt-5">Data Limbah Warga</h3>

            <div>
                <canvas id="myChart"></canvas>
            </div>

            <div class="d-flex align-items-center justify-content-between my-5">
                {{-- search --}}
                <form action="{{ route('admin.tagihan') }}" method="GET" class="w-50 me-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan kata kunci" name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                {{-- filter --}}
                <form action="{{ route('admin.tagihan') }}" method="GET" class="w-50 ms-2">
                    <div class="input-group d-flex">
                        <label class="input-group-text" for="bulanFilter">Filter Bulan:</label>
                        <select class="form-select" id="bulanFilter" name="bulan">
                            <option value="">Pilih Bulan...</option>
                            <option value="Januari" {{ request('bulan') == 'Januari' ? 'selected' : '' }}>Januari</option>
                            <option value="Februari" {{ request('bulan') == 'Februari' ? 'selected' : '' }}>Februari</option>
                            <option value="Maret" {{ request('bulan') == 'Maret' ? 'selected' : '' }}>Maret</option>
                            <option value="April" {{ request('bulan') == 'April' ? 'selected' : '' }}>April</option>
                            <option value="Mei" {{ request('bulan') == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ request('bulan') == 'Juni' ? 'selected' : '' }}>Juni</option>
                            <option value="Juli" {{ request('bulan') == 'Juli' ? 'selected' : '' }}>Juli</option>
                            <option value="Agustus" {{ request('bulan') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                            <option value="September" {{ request('bulan') == 'September' ? 'selected' : '' }}>September</option>
                            <option value="Oktober" {{ request('bulan') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ request('bulan') == 'November' ? 'selected' : '' }}>November</option>
                            <option value="Desember" {{ request('bulan') == 'Desember' ? 'selected' : '' }}>Desember</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-tagihan">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Catatan Keuangan</th>
                        <th scope="col">Limbah Terkumpul</th>
                        <th scope="col">Tanggal Pengumpulan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->sampah_tkmpls->first()->bulan ?? now()->format('F') }}</td>
                            <td>Rp.{{ $data->sampah_tkmpls->first()->Hasil ?? '-' }}</td>
                            <td>{{ $data->sampah_tkmpls->first()->Berat ?? '-' }}Gram</td>
                            <td>
                                {{ $data->sampah_tkmpls->first() ? $data->sampah_tkmpls->first()->created_at->format('d-m-Y') : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    {{-- script chart js --}}
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>

        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($values); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Hasil per Tahun',
                    data: data,
                    borderWidth: 1,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
