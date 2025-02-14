@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'BERITA'])

<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <a href="{{ url('pberita/'.$berita->slug) }}" alt="..." />
                <img class="card-img-top featured-img" src="{{ asset('storage/back/' .$berita->img) }}" alt="..." />
                </a>
                <div class="card-body">
                    <div class="small text-muted">{{ $berita->created_at->format('d-m-Y')}}</div>
                    <h2 class="card-title">{{ $berita->title }}</h2>
                    <p class="card-text">
                        {!! $berita->desc !!}
                    </p>
                </div>
            </div>
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
    </div>
</div>
@include('front.layout.footer')
@include('front.layout.scripts')