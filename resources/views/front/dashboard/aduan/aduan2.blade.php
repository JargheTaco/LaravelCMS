@include('front.layout.assets')
@include('front.layout.navbar')

<header class="header2" style="padding-top: 100px">
    <h1>Aduan</h1>
    <h2>FAQ</h2>
    <div class="divider2"></div>
</header>
@foreach($faq as $item)
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$item->title}}</h2>
            <h3 class="section-subheading text-muted">{{$item->desc}}</h3>
        </div>
        <div class="iframe-container">
            <iframe src="https://docs.google.com/gview?url={{ urlencode($item->pdf) }}&embedded=true" width="640" height="880" allow="autoplay"></iframe>
        </div>
    </div>
</section>
@endforeach
@include('front.layout.footer')
@include('front.layout.scripts')