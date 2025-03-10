@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'INFO KEGIATAN'])
@include('front.layout.assets')

<!-- Page content-->
<div class="container">
    <!-- Blog entries-->
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        @foreach ($infokegiatan as $item)
        <div class="col-lg-4">
            <!-- Blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('pinfokegiatan/'.$item->slug) }}">
                    <img class="card-img-top post-img" src="{{ $item->img }}" alt="Gambar" />
                </a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        {{ $item->created_at->format('d-m-Y')}}
                    </div>
                    <h2 class="card-title h4">{{ $item->title}}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 200, '...') }}</p>
                    <a class="btn btn-primary" href="{{ url('pinfokegiatan/'.$item->slug) }}">Read more →</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        {{ $infokegiatan->links() }}
    </div>
</div>

@include('front.layout.footer')
@include('front.layout.scripts')