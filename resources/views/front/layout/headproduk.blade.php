<!-- Header -->
<header class="header2" style="padding-top: 100px">
    <h2>Produk Hukum</h2>
    <h3> @switch($title)
            @case('Kumpulan Produk Hukum')
                Kumpulan Produk Hukum
            @break

            @case('Rancangan Peraturan')
                Rancangan Peraturan
            @break

            @default
                Standar Operasional Prosedur
        @endswitch
    </h3>
    <div class="divider2"></div>
</header>

<div class="container mt-5">
    <h3> @switch($title)
            @case('Kumpulan Produk Hukum')
                Daftar Kumpulan Produk Hukum
            @break

            @case('Rancangan Peraturan')
                Daftar Rancangan Peraturan
            @break
            @default
                Standar Operasional Prosedur
        @endswitch
    </h3>
</div>