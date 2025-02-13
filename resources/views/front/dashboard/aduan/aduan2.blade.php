@include('front.layout.stylesheet');
@include('front.layout.navbar')
<header class="header2" style="padding-top: 100px">
    <h1>Aduan</h1>
    <h2>Formulir Aduan</h2>
    <div class="divider2"></div>
</header>
<div class="aduan-container">
    <!-- Left Side: Daftar Aduan -->
    <div class="aduan-list">
        <h2>Daftar Aduan</h2>

        <div class="aduan-card">
            
            <div class="aduan-header">
                <span class="aduan-user">👤 Kalisal</span>
                <span class="aduan-date">📅 Selasa, 21 Januari 2025 - 10:14:54</span>
            </div>
            <h3><a href="{{ url('/galeri') }}">Penyelesaian <strong>Jual Beli Rumah</strong></a></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut at itaque expedita deserunt, nobis illo eligendi ex saepe voluptate velit quasi numquam cupiditate, natus ipsam minus architecto voluptatum? Ratione, blanditiis.</p>
            </li>
        </div>

        <div class="aduan-card">
            <div class="aduan-header">
                <span class="aduan-user">👤 Rio Handoko</span>
                <span class="aduan-date">📅 Jum’at, 15 November 2024 - 14:29:46</span>
            </div>
            <h3>Imunisasi Catin Wanita</h3>
            <p>Izin bertanya bisa kah calon saya perempuan mendapatkan pelayanan imunisasi catin di wilayah Yogyakarta soalnya dy bertugas sebagai perawat di RS UII ...</p>
        </div>

        <div class="aduan-card">
            <div class="aduan-header">
                <span class="aduan-user">👤 NN</span>
                <span class="aduan-date">📅 Sabtu, 14 September 2024 - 08:04:22</span>
            </div>
            <h3>Bakar Sampah</h3>
            <p>Mohon tindakan nya karena tetangga kanan kiri bakar sampah setiap hari dan sangat berbahaya di musim kemarau yang kering seperti ini. Mohon segera ...</p>
        </div>
    </div>

    <!-- Right Side: Form Aduan -->
    <div class="aduan-form">
        <h2>Form Aduan</h2>
        <form>
            <input type="text" placeholder="Nama">
            <input type="email" placeholder="Email">
            <input type="tel" placeholder="No. Telp">
            <textarea placeholder="Alamat"></textarea>
            <input type="text" placeholder="Topik Pembahasan Keluhan">
            <textarea placeholder="Isi Pesan/Keluhan Anda"></textarea>

            <div class="captcha-container">
                <span class="captcha-text">penuba</span>
                <button type="button" class="recaptcha-btn">🔄 Recaptcha</button>
            </div>

            <input type="text" placeholder="Masukkan security code">
            <button type="submit" class="submit-btn">✈ KIRIM</button>
        </form>
    </div>
</div>


@include('front.layout.footer')
@include('front.layout.scripts')