@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'Info Kegiatan'])

<!-- Page content-->
<div class="container">
    <div class="row">
            <div class="card mb-4">
                <a href="{{ url('pinfokegiatan/'.$infokegiatan->slug) }}" alt="..." />
                <img class="card-img-top featured-img" src="{{ $infokegiatan->img }}" alt="..." />
                </a>
                <div class="card-body">
                    <div class="small text-muted">{{ $infokegiatan->created_at->format('d-m-Y')}}</div>
                    <h2 class="card-title">{{ $infokegiatan->title }}</h2>
                    <p class="card-text">
                        {!! $infokegiatan->desc !!}
                    </p>
                </div>
            </div>
            </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
    </div>
</div>
@include('front.layout.footer')
@include('front.layout.scripts')