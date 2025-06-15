<!-- Header -->
<header class="header2" style="padding-top: 100px">
    <h2>INFORMASI</h2>
    <h3> @switch($title)
            @case('Laporan Informasi Publik')
                Laporan Informasi Publik
            @break

            @case('Pengadaan Barang Dan Jasa')
                Pengadaan Barang Dan Jasa
            @break

            @case('Permohonan Informasi')
                Permohonan Informasi
            @break
            @case('Anggaran Tahunan')
                Anggaran Tahunan
            @break

            @default
                Agenda Pimpinan
        @endswitch
    </h3>
    <div class="divider2"></div>
</header>

<div class="container mt-5">
    <h3> @switch($title)
            @case('Laporan Informasi Publik')
                Daftar Laporan Informasi Publik
            @break

            @case('Pengadaan Barang Dan Jasa')
                Daftar Pengadaan Barang Dan Jasa
            @break
            @case('Anggaran Tahunan')
                Daftar Anggaran Tahunan
            @break

            @case('Permohonan Informasi')
            @break

            @default
                Daftar Agenda Pimpinan
        @endswitch
    </h3>
</div>