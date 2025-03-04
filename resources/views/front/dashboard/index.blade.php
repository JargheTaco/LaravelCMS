<!DOCTYPE html>
<html lang="en">

@include('front.layout.assets')
@include('front.layout.navbar')


<header>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('front/img/bg2.jpg') }}');">
                <div class="carousel-caption">
                    <h5>Selamat Datang</h5>
                    <p>DINAS DUKCAPIL Kota Tegal</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('front/img/bg1.jpg') }}');">
                <div class="carousel-caption">
                    <h5>Selamat Datang</h5>
                    <p>DINAS DUKCAPIL Kota Tegal</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('front/img/Capil.png') }}');">
                <div class="carousel-caption">
                    <h5>Selamat Datang</h5>
                    <p>DINAS DUKCAPIL Kota Tegal</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>

<section class="page-section" id="services" style="padding-bottom: 50px">
    <div class="container">
        <div class="text-center" style="padding-top: 50px">
            <h2 class="section-heading text-uppercase">Layanan Utama</h2>
            <h3 class="section-subheading text-muted">Layanan utama yang kami hadirkan untuk masyarakat sebagai bentuk
                komitmen dalam mewujudkan Tegal yang Mandiri dan Sejahtera.</h3>
        </div>

        <div class="btn-container">
            <div class="btn-group">
                <a href="#" class="btn btn-primary">Pencatatan Sipil</a>
                <a href="#" class="btn btn-primary">Pendaftaran Penduduk</a>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-primary">Pengelolaan SIAK</a>
                <a href="#" class="btn btn-primary">Pemanfaatan Data</a>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <!-- Berita Terkini -->
        <div class="col-md-6">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Berita Terkini</h2>
            </div>
            <div class="card mb-4">
                <a href="{{ url('pberita/'.$latest_post_berita->slug) }}">
                    <img class="card-img-top featured-img" src="{{ $latest_post_berita->img }}" alt="..." />
                </a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        {{ $latest_post_berita->created_at->format('d-m-Y')}}
                        |
                        {{ $latest_post_berita->Category->name}}
                    </div>
                    <h2 class="card-title">{{ $latest_post_berita->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post_berita->desc), 250, '...') }}</p>
                    <a class="btn btn-primary" href="{{url('pberita/'.$latest_post_berita->slug)}}">Read more →</a>
                </div>
            </div>
        </div>

        <!-- Artikel Terkini -->
        <div class="col-md-6">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Artikel Terkini</h2>
            </div>
            <div class="card mb-4">
                <a href="{{url('partikel/'.$latest_post_article->slug)}}">
                    <img class="card-img-top featured-img" src="{{ $latest_post_article->img }}" alt="..." />
                </a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        {{ $latest_post_article->created_at->format('d-m-Y')}}
                        |
                        {{ $latest_post_article->Category->name}}
                    </div>
                    <h2 class="card-title">{{ $latest_post_article->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post_article->desc), 250, '...') }}</p>
                    <a class="btn btn-primary" href="{{url ('partikel/'. $latest_post_article->slug)}}">Read more →</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team-->
@foreach ($kepaladinas as $pejabat)
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center" style="padding-top: 50px">
            <h2 class="section-heading text-uppercase">KEPALA DINAS </h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{$pejabat->img}}" alt="..." />
                        alt="..." />
                    <h4>{{ $pejabat->title}}</h4>
                    <p class="text-muted">{{$pejabat->jabatan}}</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"
                        aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"
                        aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"
                        aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<header class="header2" style="padding-top: 100px">
    <h1>Sistem Informasi</h1>
    <div class="divider2"></div>
</header>
<div class="system-card-container">
@foreach ($inovasis as $item)
    <div class="system-card">
        <h3>{{ $item->title}}</h3>
        <img src="{{ $item->img }}" alt="">
        <p>{{$item->desc}}</p>
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>
@endforeach
</div>
@include('front.layout.footer')
@include('front.layout.scripts')
@yield('content')