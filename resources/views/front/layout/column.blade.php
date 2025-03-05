

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1>
                @switch($title)
                    @case('ARTIKEL')
                        ARTIKEL
                        @break
                    @case('INFO KEGIATAN')
                        INFO KEGIATAN
                        @break
                    @case('PENGUMUMAN')
                        PENGUMUMAN
                        @break
                    @default
                        BERITA
                @endswitch
            </h1>
        </div>
    </div>
</header>
