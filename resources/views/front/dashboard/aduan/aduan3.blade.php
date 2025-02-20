<!DOCTYPE html>
<html lang="en">
@include('front.layout.assets')
@include('front.layout.navbar')

<header class="header2" style="padding-top: 100px">
    <h1>Aduan</h1>
    <h2>FAQ</h2>
    <div class="divider2"></div>
</header>
<section class="page-section" id="services">
    <div class="container">
        <div class="iframe-container">
            <iframe type="application/pdf" src="https://laravel-project-self.vercel.app/back/assets/pdf/report.pdf" width="820" height="1200" allow="autoplay"></iframe>
        </div>
    </div>
</section>

@include('front.layout.footer')
@include('front.layout.scripts')