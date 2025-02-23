@include('front.layout.stylesheet')
@include('front.layout.navbar')
<header class="header2" style="padding-top: 100px">
    <h1>Inovasi</h1>
    <h2>Sistem Infromasi</h2>
    <div class="divider2"></div>
</header>
<div class="system-card-container">
@foreach ($inovasis as $item)
    <div class="system-card">
        <h3>{{ $item->title}}</h3>
        <img src="{{ $item->img }}" alt="">
        <p>{{$item->desc}}</p>
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>
@endforeach
</div>



@include('front.layout.footer')
@include('front.layout.scripts')