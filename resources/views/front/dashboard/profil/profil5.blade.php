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
      <p><strong>{{$item->jabatan}}</strong></p>
      <a href="#profilmodal{{ $item->id }}" class="profile-btn">Lihat Profil</a>
    </div>
  @endforeach
</div>

@foreach($profilpejabat as $item)
<div class="portfolio-modal modal fade" id="portfolioModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">{{$item->title}}</h2>
                          <img class="img-fluid d-block mx-auto"
                              src="{{$item->img}}" alt="..." />
                          <p>{{$item->desc}}</p>
                          <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                              type="button">
                              <i class="fas fa-xmark me-1"></i>
                              Close Project
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach

@include('front.layout.footer')
@include('front.layout.scripts')