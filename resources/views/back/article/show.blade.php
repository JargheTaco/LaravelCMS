@extends('back.layout.template')

@section('title', 'Detail Article - Admin')

@section('content')
<style>
    .article-content img {
    max-width: 300px; /* Atur ukuran maksimal gambar */
    height: auto;
    display: block;
    margin: 10px 0;
}

.article-content {
    max-width: 700px; /* Batasi lebar konten deskripsi */
    font-size: 14px; /* Kecilkan ukuran font */
    line-height: 1.5;
}

</style>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Articles</h1>

    </div>

    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th width="250px" >Title</th>
                <td>: {{ $article->title }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>: {{ $article->category->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td class="article-content" style="max-width: 700px; overflow: hidden;">
                    {!! $article->desc !!}
                </td>


            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <a href="{{ asset('storage/back/'.$article->img) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('storage/back/'.$article->img) }}" alt="" width="50%">
                    </a>
                </td>
            </tr>
            <tr>
                <th>Views</th>
                <td>: {{ $article->view }}x</td>
            </tr>
            <tr>
                <th>Status</th>
                @if ($article->status == 1)
                    <td>: <span class="badge bg-success">Published</span></td>
                @else
                <td>: <span class="badge bg-danger">Private</span></td>
                @endif
            </tr>
            <tr>
                <th>Publish Date</th>
                <td>: {{ $article->publish_date }}</td>
            </tr>
        </table>

        <div class="float-end">
            <a href="{{ url('article') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    @endsection