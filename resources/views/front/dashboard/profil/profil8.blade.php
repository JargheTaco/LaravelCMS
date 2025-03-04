@include('front.layout.assets')
@include('front.layout.navbar')
<header class="header2" style="padding-top: 100px">
    <h1>Profil</h1>
    <h2>Aset Dan Inventarisasi Barang</h2>
    <div class="divider2"></div>
</header>
<div class="container mt-5">
    <h2>DAFTAR ASET DAN INVENTARISASI BARANG</h2>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($aset as $index => $item)
            <tr data-tahun="{{ $item->year }}" data-judul="{{ $item->title }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->title }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="iframe-container text-center">
                        <iframe src="https://docs.google.com/gview?url={{ urlencode($item->pdf) }}&embedded=true" width="100%" height="500" allow="autoplay"></iframe>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('front.layout.footer')
@include('front.layout.scripts')