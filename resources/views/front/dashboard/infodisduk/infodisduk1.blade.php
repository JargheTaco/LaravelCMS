@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'BERITA'])

<!-- Page content-->
<div class="container">
    <!-- Blog entries-->
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        @foreach ($beritas as $item)
        <div class="col-lg-4">
            <!-- Blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('pberita/'.$item->slug) }}">
                    <img class="card-img-top post-img" src="{{ $item->img }}" alt="Gambar Berita" />
                </a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        {{ $item->created_at->format('d-m-Y')}}
                        |
                        {{ $item->Category->name}}
                    </div>
                    <h2 class="card-title h4">{{ $item->title}}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 200, '...') }}</p>
                    <a class="btn btn-primary" href="{{ url('pberita/'.$item->slug) }}">Read more →</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        {{ $beritas->links() }}
    </div>
</div>

@include('front.layout.footer')
@include('front.layout.scripts')