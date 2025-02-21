@include('front.layout.assets')
@include('front.layout.navbar')

<div class="custom-container">
    <header class="custom-header" style="padding-top: 100px">
        <h1>Visi & Misi DUKCAPIL Kota Tegal</h1>
        <div class="custom-divider"></div>
    </header>
    <div class="custom-card-container" style="padding-top: 20px;">
        
        @if ($visimisi->isNotEmpty()) {{-- Cek apakah ada data --}}
            @foreach ($visimisi as $item)
                <div class="custom-card">
                    <div class="custom-card-header">{{ $item->title }}</div>
                    <div class="custom-card-body">
                        {{ $item->desc }}
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center">
                <strong>Data Visi & Misi belum tersedia.</strong>
            </div>
        @endif

    </div>
</div>

@include('front.layout.scripts')
