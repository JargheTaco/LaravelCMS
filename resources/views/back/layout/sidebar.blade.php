 <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">CMS DUKCAPIL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{url('dashboard')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('article')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Articles
              </a>
            </li>
            @if (Auth::user()->role == 1)
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('categories')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Categories
              </a>
            </li>
            @endif

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('users')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Users
              </a>
            </li>
          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>                        
          </ul>
        </div>
      </div>
    </div>
