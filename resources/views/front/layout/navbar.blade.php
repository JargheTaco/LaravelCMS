<!--=============== HEADER ===============-->
<header class="header">
    <nav class="nav container">
        <div class="nav__data">
            <a href="#" class="nav__logo">
                <img src="{{ asset('front/img/DUKCAPIL KOTA TEGAL.png') }}" alt="Logo"
                    style="height: 40px;" />
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
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'RENJA' => [['title' => 'Dokumen', 'url' => '#'], ['title' => 'Dokumen', 'url' => '#']],
                                'TAHUN ANGGARAN 2021' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'TAHUN ANGGARAN 2022' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'TAHUN ANGGARAN 2023' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'TAHUN ANGGARAN 2024' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'TAHUN ANGGARAN 2025' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
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
                            <li><a class="dropdown__link"
                                    href="{{ url('/infodisduk/' . $id) }}">{{ $title }}</a></li>
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
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'ALUR LAYANAN' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
                                ],
                                'PRODUK HUKUM' => [
                                    ['title' => 'Dokumen', 'url' => '#'],
                                    ['title' => 'Dokumen', 'url' => '#'],
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
                        <li><a class="dropdown__link" href="#program1">PERMOHONAN INFORMASI</a></li>
                        <li><a class="dropdown__link" href="#program2">LAPORAN INFORMASI PUBLIK</a></li>
                        <li><a class="dropdown__link" href="#program2">PENGADAAN BARANG DAN JASA</a></li>
                        <li><a class="dropdown__link" href="#program1">AGENDA PIMPINAN</a></li>
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
                <li ><a href="{{ route('login') }}" class="nav__link btn btn-outline-primary">Login</a></li>
            </ul>
        </div>
    </nav>
</header>