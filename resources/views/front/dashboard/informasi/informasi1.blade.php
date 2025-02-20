@include('front.layout.assets')
@include('front.layout.navbar')
@include('front.layout.headinfor',['title' => 'Permohonan Informasi'])  


    <form class="info-request-form">
    <label for="namaPemohon" class="input-label">Nama Pemohon</label>
    <input type="text" id="namaPemohon" class="input-field" name="namaPemohon">

    <label for="noIdentitas" class="input-label">No Identitas (KTP/SIM/KITAS)</label>
    <input type="text" id="noIdentitas" class="input-field" name="noIdentitas">

    <label for="email" class="input-label">Email</label>
    <input type="email" id="email" class="input-field" name="email">

    <label for="noTelp" class="input-label">No. Telp</label>
    <input type="tel" id="noTelp" class="input-field" name="noTelp">

    <label for="informasi" class="input-label">Rincian Informasi yang diminta</label>
    <textarea id="informasi" class="input-field" name="informasi"></textarea>

    <label for="tujuanPenggunaan" class="input-label">Tujuan Penggunaan Informasi</label>
    <textarea id="tujuanPenggunaan" class="input-field" name="tujuanPenggunaan"></textarea>

    <label class="input-label">Kategori Pemohon</label>
    <input type="radio" id="perorangan" name="kategoriPemohon" value="Perorangan" class="radio-input">
    <label for="perorangan" class="radio-label">Perorangan</label>
    <input type="radio" id="lembaga" name="kategoriPemohon" value="Lembaga" class="radio-input">
    <label for="lembaga" class="radio-label">Lembaga</label>

    <label class="input-label">Cara Memperoleh Informasi</label>
    <input type="checkbox" id="melihat" name="caraMemperolehInformasi" value="Melihat" class="checkbox-input">
    <label for="melihat" class="checkbox-label">Melihat</label>
    <input type="checkbox" id="mendengarkan" name="caraMemperolehInformasi" value="Mendengarkan" class="checkbox-input">
    <label for="mendengarkan" class="checkbox-label">Mendengarkan</label>
    <input type="checkbox" id="membaca" name="caraMemperolehInformasi" value="Membaca" class="checkbox-input">
    <label for="membaca" class="checkbox-label">Membaca</label>
    <input type="checkbox" id="mencatat" name="caraMemperolehInformasi" value="Mencatat" class="checkbox-input">
    <label for="mencatat" class="checkbox-label">Mencatat</label>

    <label class="input-label">Mendapatkan Salinan Informasi</label>
    <input type="checkbox" id="softcopy" name="mendapatkanSalinanInformasi" value="Softcopy" class="checkbox-input">
    <label for="softcopy" class="checkbox-label">Softcopy</label>
    <input type="checkbox" id="hardcopy" name="mendapatkanSalinanInformasi" value="Hardcopy" class="checkbox-input">
    <label for="hardcopy" class="checkbox-label">Hardcopy</label>

    <label class="input-label">Cara Mendapatkan Salinan Informasi</label>
    <input type="checkbox" id="ambilLangsung" name="caraMendapatkanSalinanInformasi" value="Mengambil Langsung" class="checkbox-input">
    <label for="ambilLangsung" class="checkbox-label">Mengambil Langsung</label>
    <input type="checkbox" id="email" name="caraMendapatkanSalinanInformasi" value="E-mail" class="checkbox-input">
    <label for="email" class="checkbox-label">E-mail</label>
    <input type="checkbox" id="kurir" name="caraMendapatkanSalinanInformasi" value="Kurir / POS" class="checkbox-input">
    <label for="kurir" class="checkbox-label">Kurir / POS</label>

    <div class="captcha-section">
        <img src="captcha_image" alt="Captcha">
        <input type="text" id="captcha" name="captcha" class="input-field">
    </div>

    <button type="submit" class="submit-button">KIRIM</button>
</form>

@include('front.layout.footer')
@include('front.layout.scripts')