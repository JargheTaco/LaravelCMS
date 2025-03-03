<!--=============== HEADER ===============-->
<header class="header">
    <nav class="nav container">
        <div class="nav__data">
            <a href="{{ url('/') }}" class="nav__logo">
                <img src="{{ asset('front/img/Tegal.svg.png') }}" alt="Logo" style="height: 40px;" />
            </a>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__burger"></i>
                <i class="ri-close-line nav__close"></i>
            </div>
        </div>

        <!--=============== NAV MENU ===============-->
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li><a href="{{ url('/') }}" class="nav__link"><i class="fas fa-home"></i>Home</a></li>

                <!--=============== DROPDOWN 1: Profil ===============-->
                <li class="dropdown__item">
                    <div class="nav__link">
                        <i class="fas fa-clipboard-list"></i> Profil <i
                            class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @php
                            $profiles = [
                                1 => 'VISI & MISI DISDUK KOTA TEGAL',
                                2 => 'TUGAS DAN FUNGSI DINAS DUKCAPIL KOTA TEGAL',
                                3 => 'STRUKTUR ORGANISASI DINAS DUKCAPIL KOTA TEGAL',
                                4 => 'SEJARAH',
                                5 => 'PROFIL PEJABAT',
                                6 => 'LHKPN',
                                7 => 'KEPEGAWAIAN',
                                8 => 'ASET DAN INTERISASI BARANG',
                            ];
                        @endphp

                        @foreach ($profiles as $id => $title)
                            <li><a class="dropdown__link" href="{{ url('/profil/' . $id) }}">{{ $title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!--=============== DROPDOWN 2: Program & Kegiatan ===============-->
                <li class="dropdown__item">
                    <div class="nav__link">
                        <i class="fas fa-clipboard-list"></i> Program & Kegiatan <i
                            class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @php
                            $programs = [
                                'RENSTRA' => [
                                    ['title' => 'Dokumen Renstra 2017-2022', 'url' => url('/renstra/1')],
                                    ['title' => 'Dokumen Renstra 2022-2027', 'url' => url('/renstra/2')],
                                ],
                                'RENJA' => [
                                    ['title' => 'Renja 2020-2023', 'url' => url('/renja/1')],
                                    ['title' => 'Renja 2024-2026', 'url' => url('/renja/2')],
                                ],
                                'TAHUN ANGGARAN' => [
                                    ['title' => 'Tahun Anggaran 2021', 'url' => url('/anggaran/1')],
                                    ['title' => 'Tahun Anggaran 2022', 'url' => url('/anggaran/2')],
                                    ['title' => 'Tahun Anggaran 2023', 'url' => url('/anggaran/3')],
                                    ['title' => 'Tahun Anggaran 2024', 'url' => url('/anggaran/4')],
                                    ['title' => 'Tahun Anggaran 2025', 'url' => url('/anggaran/5')],
                                ],
                            ];
                        @endphp

                        @foreach ($programs as $programName => $documents)
                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-bar-chart-line"></i> {{ $programName }} <i
                                        class="ri-add-line dropdown__add"></i>
                                </div>

                                <ul class="dropdown__submenu">
                                    @foreach ($documents as $document)
                                        <li>
                                            <a href="{{ $document['url'] }}" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> {{ $document['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ url('/inovasi') }}" class="nav__link"><i class="fas fa-lightbulb"></i>Inovasi</a></li>

                <!--=============== DROPDOWN 3: Info DisDuk ===============-->
                <li class="dropdown__item">
                    <div class="nav__link">
                        <i class="fas fa-info-circle"></i> Info DisDuk<i
                            class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @php
                            $infoDisduk = [
                                1 => 'BERITA',
                                2 => 'ARTIKEL',
                                3 => 'INFO KEGIATAN',
                                4 => 'PENGUMUMAN',
                            ];
                        @endphp

                        @foreach ($infoDisduk as $id => $title)
                            <li><a class="dropdown__link" href="{{ url('/infodisduk/' . $id) }}">{{ $title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!--=============== DROPDOWN 4: Informasi ===============-->
                <li class="dropdown__item">
                    <div class="nav__link">
                        <i class="fas fa-clipboard-list"></i> Informasi <i
                            class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @php
                            $informasi = [
                                'PPID/INFORMASI PUBLIK' => [
                                    ['title' => 'Informasi Berkala', 'url' => url('/ppid/1')],
                                    ['title' => 'informasi Setiap Saat', 'url' => url('/ppid/2')],
                                    ['title' => 'informasi Serta Merta', 'url' => url('/ppid/3')],
                                    ['title' => 'Daftar Informasi Publik', 'url' => url('/ppid/4')],
                                    ['title' => 'Daftar Informasi Publik Yang Dikecualikan', 'url' => url('/ppid/5')],
                                ],
                                'ALUR LAYANAN' => [
                                    ['title' => 'Alur Permohonan Informasi', 'url' => url('/alurlayanan/1')],
                                    ['title' => 'Alur Pengajuan Keberatan Informasi Publik', 'url' => url('/alurlayanan/2')],
                                    ['title' => 'Alur Penyelesaian Sengketan', 'url' => url('/alurlayanan/3')],
                                ],
                                'PRODUK HUKUM' => [
                                    ['title' => 'Kumpulan Produk Hukum', 'url' => url('/produkhukum/1')],
                                    ['title' => 'Rancangan Peraturan', 'url' => url('/produkhukum/2')],
                                    ['title' => 'Standar Operasional Prosedur', 'url' => url('/produkhukum/3')],
                                ],
                            ];
                        @endphp

                        @foreach ($informasi as $sectionName => $documents)
                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-bar-chart-line"></i> {{ $sectionName }} <i
                                        class="ri-add-line dropdown__add"></i>
                                </div>

                                <ul class="dropdown__submenu">
                                    @foreach ($documents as $document)
                                        <li>
                                            <a href="{{ $document['url'] }}" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> {{ $document['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <!-- Static Links -->
                        <li><a class="dropdown__link" href="{{ url('/informasi/1') }}">PERMOHONAN INFORMASI</a></li>
                        <li><a class="dropdown__link" href="{{ url('/informasi/2') }}">LAPORAN INFORMASI PUBLIK</a></li>
                        <li><a class="dropdown__link" href="{{ url('/informasi/3') }}">PENGADAAN BARANG DAN JASA</a></li>
                        <li><a class="dropdown__link" href="{{ url('/informasi/4') }}">AGENDA PIMPINAN</a></li>
                    </ul>
                </li>

                <!--=============== DROPDOWN 5: Aduan ===============-->
                <li class="dropdown__item">
                    <div class="nav__link">
                        <i class="fas fa-info-circle"></i> ADUAN<i class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @php
                            $aduan = [
                                1 => 'SALURAN PENGADUAN',
                                2 => 'FORMULIR ADUAN',
                                3 => 'FAQ',
                            ];
                        @endphp

                        @foreach ($aduan as $id => $title)
                            <li><a class="dropdown__link" href="{{ url('/aduan/' . $id) }}">{{ $title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ url('/galeri') }}" class="nav__link"><i class="fas fa-images"></i>Galeri</a></li>
                <li><a href="{{ url('/kontak') }}" class="nav__link"><i class="fas fa-envelope"></i>Kontak</a></li>
                <li><a href="{{ url('/kebijakan') }}" class="nav__link"><i class="fas fa-shield-alt"></i>Kebijakan &
                        Privasi</a></li>
            </ul>
        </div>
    </nav>
</header>