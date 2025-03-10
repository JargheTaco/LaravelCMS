@include('front.layout.assets')
@include('front.layout.navbar')

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Dokumentasi</h2>
            <h3 class="section-subheading text-muted">Seputar Kegiatan Disdukcapil Kota Tegal</h3>
        </div>
        
        <div class="row">
        @foreach ($dokumentasi as $item)
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $item->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="card-img-top post-img" src="{{ $item->img }}" alt="Gambar Artikel" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $item->title}}</div>
                    </div>
                </div>
            </div>
        @endforeach
           
</section>
<div>
    {{ $dokumentasi->links() }}
</div>

@include('front.layout.footer')
<!-- Portfolio item 1 modal popup-->
@foreach ($dokumentasi as $item)
    <div class="portfolio-modal modal fade" id="portfolioModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('front/img/close-icon.svg') }}" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <h2 class="text-uppercase">{{ $item->title }}</h2>
                                <img class="img-fluid d-block mx-auto" src="{{ $item->img }}" alt="..." />
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i> Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


@include('front.layout.scripts')
