@extends('back.layout.template')
@section('title', 'Dashboard - Admin')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <div class="row">
    <div class="col-6">
      <div class="card text-bg-primary mb-3" style="max-width: 100%;">
        <div class="card-header">Total Article</div>
        <div class="card-body">
          <h5 class="card-title">{{ $total_articles }} Articles</h5>
          <p class="card-text">
            <a href="{{ url('article')}}" class="text-white">View Article</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card text-bg-success mb-3" style="max-width: 100%;">
        <div class="card-header">Total Berita</div>
        <div class="card-body">
          <h5 class="card-title">{{ $total_beritas }} Berita</h5>
          <p class="card-text">
            <a href="{{ url('berita')}}" class="text-white">View Categories</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card text-bg-success mb-3" style="max-width: 100%;">
        <div class="card-header">Total Pengumuman</div>
        <div class="card-body">
          <h5 class="card-title">{{ $total_pengumuman }} Berita</h5>
          <p class="card-text">
            <a href="{{ url('pengumuman')}}" class="text-white">View Categories</a>
          </p>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card text-bg-success mb-3" style="max-width: 100%;">
        <div class="card-header">Informasi Berkala</div>
        <div class="card-body">
          <h5 class="card-title">{{ $total_informasiberkala }} Berita</h5>
          <p class="card-text">
            <a href="{{ url('informasiberkala')}}" class="text-white">View Categories</a>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <h4>Latest Articles</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Category</th>
              <th>Create At</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($latest_article as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->Category->name }}</td>
              <td>{{ $item->created_at }}</td>
              <td class="text-center">
                <a href="{{ url('article/' .$item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="col-6">
        <h4>Latest Berita</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Category</th>
              <th>Create At</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($latest_berita as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->Category->name }}</td>
              <td>{{ $item->created_at }}</td>
              <td class="text-center">
                <a href="{{ url('berita/' .$item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
    <div class="row">
      <div class="col-6">
        <h4>Latest Pengumuman</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Create At</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($latest_pengumuman as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->created_at }}</td>
              <td class="text-center">
                <a href="{{ url('pengumuman/' .$item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="col-6">
        <h4>Latest Informasi Berkala</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Create At</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($latest_informasiberkala as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->created_at }}</td>
              <td class="text-center">
                <a href="{{ url('informasiberkala/' .$item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>


</main>
@endsection