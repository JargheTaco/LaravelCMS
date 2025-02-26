@include('front.layout.assets')
@include('front.layout.navbar')
<header class="custom-header" style="padding-top: 100px">
    <h1>LHKPN</h1>
    <div class="custom-divider"></div>
</header>
<div class="unique-card-container">
    @foreach($lhkpn as $item)
    <div class="unique-card card-1">
      <h3>{{$item->title}}</h3>
      <p>{{$item->jabatan}}</p>
      <a href="#portfolioModal{{ $item->id }}"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    @endforeach
  </div>
  


<!--- LHKPN1 --->
<div class="portfolio-modal modal fade" id="#portfolioModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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

<!--- LHKPN2 --->
<div class="portfolio-modal modal fade" id="LHKPN2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN3 --->
<div class="portfolio-modal modal fade" id="LHKPN3" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN4 --->
<div class="portfolio-modal modal fade" id="LHKPN4" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN5 --->
<div class="portfolio-modal modal fade" id="LHKPN5" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN6 --->
<div class="portfolio-modal modal fade" id="LHKPN6" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN7 --->
<div class="portfolio-modal modal fade" id="LHKPN7" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN8 --->
<div class="portfolio-modal modal fade" id="LHKPN8" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

<!--- LHKPN9 --->
<div class="portfolio-modal modal fade" id="LHKPN9" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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
<!--- LHKPN10 --->
<div class="portfolio-modal modal fade" id="LHKPN10" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img
                  src="{{ asset('back/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">Project Name</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img class="img-fluid d-block mx-auto"
                              src="{{ asset('back/assets/img/portfolio/1.jpg') }}" alt="..." />
                          <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                              repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                              nostrum, reiciendis facere nemo!</p>
                          <ul class="list-inline">
                              <li>
                                  <strong>Client:</strong>
                                  Threads
                              </li>
                              <li>
                                  <strong>Category:</strong>
                                  Illustration
                              </li>
                          </ul>
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

@include('front.layout.footer')
@include('front.layout.scripts')