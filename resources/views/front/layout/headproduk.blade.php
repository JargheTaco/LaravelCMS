<!-- Header -->
<header class="header2" style="padding-top: 100px">
    <h2>Anggaran</h2>
    <h3> @switch($title)
            @case('Kumpulan Produk Hukum')
                Kumpulan Produk Hukum
            @break

            @case('Rancangan Peraturan')
                Rancangan Peraturan
            @break

            @default
                Anggaran Tahunan
        @endswitch
    </h3>
    <div class="divider2"></div>
</header>

