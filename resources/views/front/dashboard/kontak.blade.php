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

<div class="search-wrapper" id="searchWrapper">
    <div class="container">
        <div class="search-container">
            <input type="text" placeholder="Cari sesuatu...">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
</div>

<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *"
                            data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *"
                            data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                            data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a
                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton"
                    type="submit">Send Message</button></div>
        </form>
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
