<!-- Header -->
<header class="header2" style="padding-top: 100px">
    <h1>ALUR LAYANAN</h1>
    <h3> @switch($title)
            @case('Alur Permohonan Infromasi')
                Alur Permohonan Infromasi
            @break
            @case('Alur Pengajuan Keberatan Informasi Publik')
                Alur Pengajuan Keberatan Informasi Publik
            @break
            @default
                Alur Penyelesaian Sengketan
        @endswitch
    </h3>
    <div class="divider2"></div>
</header>