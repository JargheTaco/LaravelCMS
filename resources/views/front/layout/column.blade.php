<header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel_item active"
                style="">
                <div class="carousel-caption">
                    <h1>
                        @switch($title)
                            @case('ARTIKEL')
                                ARTIKEL
                                @break
                            @case('INFO KEGIATAN')
                                INFO KEGIATAN
                                @break
                            @default
                                BERITA
                        @endswitch
                    </h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ asset('back/assets/img/portfolio/2.jpg') }}"
                        alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ asset('back/assets/img/portfolio/2.jpg') }}"
                        alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top"
                        src="{{ asset('back/assets/img/portfolio/2.jpg') }}"alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://via.placeholder.com/700x400"
                        alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://via.placeholder.com/700x400"
                        alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://via.placeholder.com/700x400"
                        alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a>Project Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                    <a class="btn btn-primary" href="#">View Project</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</div>