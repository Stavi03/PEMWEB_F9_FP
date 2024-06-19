@extends('landing-page.layout.main')

@section('landing')

{{-- menampilkan navbar --}}
@include('landing-page.partials.navbar')

<div class="section d-flex justify-content-center align-items-center vh-100 welcome-section">
    <div class="p-5 d-flex flex-column align-items-center text-center fade-in">
        <h2 class="welcome-heading">LimbahKu</h2>
        <p class="welcome-text pb-5">Selamat datang di LimbahKu, Website Pengumpulan sampah daur ulang rutin desa Driyo redjo.</p>
    </div>
</div>

<!-- kegiatan -->
<section class="kegiatan">
    <div class="d-flex flex-grid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="text-center mt-5 mb-4 pb-3 fw-bold fade-in">Tau kah Kamu tentang?</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="grid row-cols-1 g-4 fade-in">
        <div class="col">
            <div class="card h-100">
                <img src="image/smpahOrganikk.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Sampah Organik</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                        molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                        eveniet beatae magni ea natus. Tenetur?</p>
                        <a href="/sampahor" class="btn btn-primary ">Penjelasan lebih lanjut</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="image/smphplastk.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Sampah Plastik</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                        molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                        eveniet beatae magni ea natus. Tenetur?</p>
                        <a href="/sampahpl" class="btn btn-primary ">Penjelasan lebih lanjut</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="image/smphKacaa.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Sampah Kaca</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                        molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                        eveniet beatae magni ea natus. Tenetur?</p>
                        <a href="/sampahkc" class="btn btn-primary ">Penjelasan lebih lanjut</a>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- end kegiatan -->

{{-- menampilkan footer --}}
@include('landing-page.partials.footer')

@endsection
