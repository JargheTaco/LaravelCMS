@include('front.layout.assets')
@include('front.layout.navbar')

<header class="header2" style="padding-top: 100px">
    <h1>Profil</h1>
    <h2>Kepegawaian</h2>
    <div class="divider2"></div>
</header>


<div class="container mt-5">
    <h2>DAFTAR KEPEGAWAIAN</h2>
    @foreach($kepegawaian as $item)
    <section class="page-section" id="services">
        <div class="container">
            <div class="iframe-container">
                <iframe src="https://docs.google.com/gview?url={{ urlencode($item->pdf) }}&embedded=true" width="640" height="880" allow="autoplay"></iframe>
            </div>
        </div>
    </section>
    @endforeach
</div>

@include('front.layout.footer')
@include('front.layout.scripts')