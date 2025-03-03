@include('front.layout.assets')
@include('front.layout.navbar')

<!-- Header -->
<header class="header2" style="padding-top: 100px">
    <h1>Kebijakan Privasi</h1>
    <div class="divider2"></div>
</header>
<!-- Frame -->
 @foreach($kebijakanprivasi as $item)
<section class="page-section" id="services">
    <div class="container">
        <div class="iframe-container">
            <iframe src="https://docs.google.com/gview?url={{ urlencode($kebijakanprivasi->pdf) }}&embedded=true" width="640" height="880" allow="autoplay"></iframe>
        </div>
    </div>
</section>
@endforeach
@include('front.layout.footer')
@include('front.layout.scripts')