@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.column', ['title' => 'BERITA'])

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/' .$latest_post_berita->img) }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ $latest_post_berita->created_at->format('d-m-Y')}}</div>
                    <h2 class="card-title">{{ $latest_post_berita->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post_berita->desc), 250, '...') }}</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($beritas as $item)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ asset('storage/back/' .$item->img) }}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $item->created_at->format('d-m-Y')}}</div>
                            <h2 class="card-title h4">{{ $item->title}}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc), 250, '...') }}</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach ($categories as $item)
                                    <span><a href="#!" class="bg-primary badge">{{ $item->name }}</a></span>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>
@include('front.layout.footer')
@include('front.layout.scripts')