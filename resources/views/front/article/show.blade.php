@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'ARTIKEL'])

<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <a href="{{ url('partikel/'.$article->slug) }}" alt="..." />
                <img class="card-img-top featured-img" src="{{ asset('storage/back/' .$article->img) }}" alt="..." />
                </a>
                <div class="card-body">
                    <div class="small text-muted">{{ $article->created_at->format('d-m-Y')}}</div>
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="card-text">
                        {!! $article->desc !!}
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