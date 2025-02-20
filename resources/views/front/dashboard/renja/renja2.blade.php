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
                <a href="{{ route('download.pdf', ['filename' => 'cth.pdf']) }}" class="btn-custom btn-custom-download-1"><i class="fas fa-download"></i> Download</a>
                <a href="{{ asset('front/pdf/' . 'cth.pdf') }}" target="_blank" class="btn-custom btn-custom-read-2"><i class="fas fa-book-open"></i> Lihat</a>
                <a href="#" class="btn-custom btn-custom-link-3" onclick="copyLink('{{ asset('front/pdf/' . 'cth.pdf') }}')"><i class="fas fa-link"></i> Copy Link</a>

            </div>
        </div>

        <div class="document-item2">
            <h4>IKU Dinas Tahun 2018-2022</h4>
            <p>IKU Dinas Tahun 2018-2022</p>
            <div class="button-group2">
                <a href="#" class="btn-custom btn-custom-download-1"><i class="fas fa-download"></i> Download</a>
                <a href="#" class="btn-custom btn-custom-read-2"><i class="fas fa-book-open"></i> Lihat</a>
                <a href="#" class="btn-custom btn-custom-link-3" onclick="copyLink()"><i class="fas fa-link"></i> Copy Link</a>

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


@include('front.layout.footer')
@include('front.layout.scripts')