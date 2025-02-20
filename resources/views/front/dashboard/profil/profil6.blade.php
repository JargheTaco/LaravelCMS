@include('front.layout.assets')
@include('front.layout.navbar')
<header class="custom-header" style="padding-top: 100px">
    <h1>LHKPN</h1>
    <div class="custom-divider"></div>
</header>
<div class="unique-card-container">
    <div class="unique-card card-1">
      <h3>Zainal Ali Mukti , A.P., M.Si</h3>
      <p>Kepala Dinas Dukcapil</p>
      <a href="#LHKPN1"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-2">
      <h3>Nama</h3>
      <p>Jabatan</p>
      <a href="#LHKPN2"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-3">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN3"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-4">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN4"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-5">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN5"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-6">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN6"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-7">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN7"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-8">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN8"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-8">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN9"  data-bs-toggle="modal"class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-8">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN10" data-bs-toggle="modal" class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-8">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN11" data-bs-toggle="modal" class="btn">Lihat LHKPN</a>
    </div>
    <div class="unique-card card-8">
        <h3>Nama</h3>
        <p>Jabatan</p>
      <a href="#LHKPN12" data-bs-toggle="modal" class="btn">Lihat LHKPN</a>
    </div>
  </div>
  

@include('back.layout.footer')

<!--- LHKPN1 --->
<div class="portfolio-modal modal fade" id="LHKPN1" tabindex="-1" role="dialog" aria-hidden="true">
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