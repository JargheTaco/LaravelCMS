
@include('front.layout.assets')
@include('front.layout.navbar')

<section class="page-section" id="services">
    <div class="container">
        <div class="iframe-container">
            <!-- Gantilah tag iframe dengan tag img -->
            <img src="{{ asset('front/img/portfolio/1.jpg') }}" alt="Deskripsi Gambar">
        </div>
    </div>
</section>

@include('front.layout.footer')
@include('front.layout.scripts')