@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'PENGUMUMAN'])

<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="card mb-4">
            <a href="{{ url('ppengumuman/'.$pengumuman->slug) }}" alt="..." />
            <img class="card-img-top featured-img" src="{{ $pengumuman->img }}" alt="..." />
            </a>
            <div class="card-body">
                <div class="small text-muted">{{ $pengumuman->created_at->format('d-m-Y')}}</div>
                <h2 class="card-title">{{ $pengumuman->title }}</h2>
                <p class="card-text">
                    {!! $pengumuman->desc !!}
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