<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DINAS DUKCAPIL KOTA TEGAL</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('back/assets/img/Tegal.svg.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('back/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<!--=============== HEADER ===============-->
<header class="header">
    <nav class="nav container">
        <div class="nav__data">
            <a href="#" class="nav__logo">
                <img src="{{ asset('back/assets/img/DUKCAPIL KOTA TEGAL.png') }}" alt="Logo"
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
                <li><a href="{{ url('/index') }}" class="nav__link"><i class="fas fa-home"></i>Home</a></li>

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
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'RENJA' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'TAHUN ANGGARAN 2021' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'TAHUN ANGGARAN 2022' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'TAHUN ANGGARAN 2023' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'TAHUN ANGGARAN 2024' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'TAHUN ANGGARAN 2025' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
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
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'ALUR LAYANAN' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                ],
                                'PRODUK HUKUM' => [
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
                                    ['title' => 'Dokumen', 'url' => '#'], // Add actual links here
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
                            <li><a class="dropdown__link"
                                    href="{{ url('/infodisduk/' . $id) }}">{{ $title }}</a></li>
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
<!-- Header - set the background image for the header in the line below-->
<header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
    <div class="text-center my-5">
        <h1 class="text-white fs-3 fw-bolder">Full Width Pics</h1>
        <p class="text-white-50 mb-0">Landing Page Template</p>
        <h2>KEPEGAWAIAN</h2>
    </div>
</header>
<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Full Width Backgrounds</h2>
                <p class="lead">A single, lightweight helper class allows you to add engaging, full width background
                    images to sections of your page.</p>
                <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem starting
                    here on Earth! I think it would be inexcusably egocentric of us to suggest that we're alone in the
                    universe.</p>
            </div>
        </div>
    </div>
</section>
<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Engaging Background Images</h2>
                <p class="lead">The background images used in this template are sourced from Unsplash and are open
                    source and free to use.</p>
                <p class="mb-0">I can't tell you how many people say they were turned off from science because of a
                    science teacher that completely sucked out all the inspiration and enthusiasm they had for the
                    course.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; DINAS DUKCAPIL KOTA TEGAL</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="https://laravel-project-self.vercel.app/back/js/navbar.js"></script>  
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
