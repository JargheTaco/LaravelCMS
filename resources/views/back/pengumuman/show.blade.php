@extends('back.layout.template')

@section('title', 'Detail Pengumuman - Admin')

@section('content')
<style>
    .article-content {
    max-width: 700px; /* Batasi lebar konten deskripsi */
    font-size: 14px; /* Kecilkan ukuran font */
    line-height: 1.5;
    word-wrap: break-word; /* Pastikan teks panjang tidak melebihi kontainer */
    overflow: auto; /* Gunakan scroll jika konten melebihi batas */
    white-space: normal; /* Biarkan teks turun ke baris berikutnya */
}


.article-content img {
    max-width: 100%; /* Buat gambar responsif */
    height: auto;
    display: block;
    margin: 10px 0;
}


</style>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pengumuman</h1>

    </div>

    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th width="250px" >Title</th>
                <td>: {{ $pengumuman->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    <div class="article-content">
                        {!! $pengumuman->desc !!}
                    </div>
                </td>
            </tr>

            <tr>
                <th>Image</th>
                <td>
                    <a href="{{ $pengumuman->img }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ $pengumuman->img }}" alt="" width="50%">
                    </a>
                </td>
            </tr>
            <tr>
                <th>Views</th>
                <td>: {{ $pengumuman->view }}x</td>
            </tr>
            <tr>
                <th>Status</th>
                @if ($pengumuman->status == 1)
                    <td>: <span class="badge bg-success">Published</span></td>
                @else
                <td>: <span class="badge bg-danger">Private</span></td>
                @endif
            </tr>
            <tr>
                <th>Publish Date</th>
                <td>: {{ $pengumuman->publish_date }}</td>
            </tr>
        </table>

        <div class="float-end">
            <a href="{{ url('pengumuman') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    @endsection