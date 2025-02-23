@include('front.layout.assets')
@include('front.layout.navbar')
<header class="custom-header" style="padding-top: 100px">
    <h1>Profil Pejabat</h1>
    <div class="custom-divider"></div>
</header>
<div class="profile-card-container">
  @foreach($profilpejabat as $item)
    <div class="profile-card">
      <img src="{{$item->img}}" alt="Profile 1">
      <h3>{{$item->title}}</h3>
      <p><strong>Jabatan</strong></p>
      <a href="#" class="profile-btn">Lihat Profil</a>
    </div>
  @endforeach
</div>
@include('front.layout.footer')
@include('front.layout.scripts')