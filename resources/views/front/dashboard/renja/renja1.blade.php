@include('front.layout.stylesheet')
@include('front.layout.navbar')

@include('front.layout.headrenja',['title' => 'renja 2020-2023'])
<!-- Container -->
<div class="container2" style="padding-top: 0px">
    <section class="document-section2">

        <div class="document-item2">
            <h4>Renstra 2017-2022 Perubahan</h4>
            <p>Renstra 2017-2022 Perubahan</p>
            <div class="button-group2">
                <a href="{{ route('download.pdf', ['filename' => 'cth.pdf']) }}"
                    class="btn-custom btn-custom-download-1"><i class="fas fa-download"></i> Download</a>
                <a data-bs-toggle="modal" href="#portfolioModal1" class="btn-custom btn-custom-read-2"><i
                        class="fas fa-book-open"></i> Lihat</a>
                <a href="#" class="btn-custom btn-custom-link-3"
                    onclick="copyLink('{{ asset('front/pdf/' . 'cth.pdf') }}')"><i class="fas fa-link"></i> Copy
                    Link</a>

            </div>
        </div>

        <div class="document-item2">
            <h4>IKU Dinas Tahun 2018-2022</h4>
            <p>IKU Dinas Tahun 2018-2022</p>
            <div class="button-group2">
                <a href="#" class="btn-custom btn-custom-download-1"><i class="fas fa-download"></i> Download</a>
                <a href="#" class="btn-custom btn-custom-read-2"><i class="fas fa-book-open"></i> Lihat</a>
                <a href="#" class="btn-custom btn-custom-link-3" onclick="copyLink()"><i class="fas fa-link"></i>
                    Copy Link</a>

            </div>
        </div>

        <div class="document-item2">
            <h4>IKU Dinas Kesehatan DIY Tahun 2018-2022 Perubahan</h4>
            <p>IKU Dinas Kesehatan DIY Tahun 2018-2022 Perubahan</p>
            <div class="button-group2">
                <a href="#" class="btn-custom btn-custom-download-1"><i class="fas fa-download"></i> Download</a>
                <a href="#" class="btn-custom btn-custom-read-2"><i class="fas fa-book-open"></i> Lihat</a>
                <a href="#" class="btn-custom btn-custom-link-3"><i class="fas fa-link"></i> Copy Link</a>

            </div>
        </div>
    </section>
</div>
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('front/img/close-icon.svg') }}"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <iframe type="application/pdf" src="{{ asset('front/pdf/' . 'cth.pdf') }}"
                                target="_blank"" width="820" height="1200" allow="autoplay"></iframe>
                            <ul class="list-inline">
                                <li>
                                    <strong>Client:</strong>
                                    Threads
                                </li>
                                <li>
                                    <strong>Category:</strong>
                                    Illustration
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('front.layout.footer')
@include('front.layout.scripts')