@include('front.layout.stylesheet')
@include('front.layout.navbar')
<header class="header2" style="padding-top: 100px">
    <h1>Inovasi</h1>
    <h2>Sistem Infromasi</h2>
    <div class="divider2"></div>
</header>
<div class="system-card-container">
    <div class="system-card">
        <h3>JAMU LAN PIJAT, AGAWE AWET URIP, TINEBIH ING RUBEDO</h3>
        <img src="jampi-ati.png" alt="Jampi Ati">
        <p>Jamu lan Pijat, Agawe awet urip, Tinebih ing rubedo</p>
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>

    <div class="system-card">
        <h3>SISTEM INFORMASI KOMUNIKASI DATA KESEHATAN KELUARGA</h3>
        <img src="icon-database.png" alt="Database Icon">
        <p>Sistem Informasi Komunikasi Data Kesehatan Keluarga</p>
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>

    <div class="system-card system-card-highlight">
        <h3>SISTEM INFORMASI IMUNISASI TERPADU</h3>
        <img src="icon-imunisasi.png" alt="Imunisasi Icon">
        <p>Sistem pengolah data dan pelaporan terkait imunisasi di Puskesmas.</p>
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>

    <div class="system-card">
        <h3>SISTEM PENANGGULANGAN GAWAT DARURAT TERPADU</h3>
        <img src="icon-ambulance.png" alt="Ambulance Icon">
        <div class="system-card-buttons">
            <a href="#" class="btn-system">Kunjungi Sistem</a>
            <a href="#" class="btn-system-outline">Selengkapnya</a>
        </div>
    </div>
</div>



@include('front.layout.footer')
@include('front.layout.scripts')