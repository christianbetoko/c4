<div>
    <!-- START NAVBAR -->
   <div class="site-mobile-menu site-navbar-target">
		  <div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close mt-3">
			  <span class="icon-close2 js-menu-toggle"></span>
			</div>
		  </div>
		  <div class="site-mobile-menu-body"></div>
	</div>
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">       
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="{{ route('home') }}"><img src="{{asset('storage/'. $enterprise->logo_with_bg)}}" alt="{{$enterprise->name}}"></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block" >

                <li class=""><a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}" href="{{ route('home') }}">Accueil</a></li>
                <li><a class="nav-link {{request()->routeIs('vision') ? 'active' : ''}}" href="{{route('vision')}}">Vision et Héritage</a></li>
                {{-- <li><a class="nav-link" href="zones.html">Les 4 Zones</a></li> --}}
                <li><a class="nav-link {{request()->routeIs('blog') ? 'active' : ''}}" href="{{route('blog')}}">Actualités</a></li>
                <li><a class="nav-link {{request()->routeIs('tools') ? 'active' : ''}}" href="{{route('tools')}}">Boîte à Outils</a></li>
                <li><a class="nav-link {{request()->routeIs('contact') ? 'active' : ''}}" href="{{route('contact')}}">Contact</a></li>
                
                <!-- BOUTON D'ACTION : REJOINDRE LA COALITION (ROUGE RDC) -->
                <li class="ml-3">
                  <a class="nav-link btn-c4-rouge" href="{{ route('joint') }}" style="background-color: {{request()->routeIs('joint') ? 'yellow' : '#CE1021'}}; color: #FFFFFF;  padding: 10px 20px; border-radius: 4px; font-weight: bold; display: inline-block; transition: background 0.3s ease;">
                    Rejoindre la coalition
                  </a>
                </li>
               
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>
    <!-- END NAVBAR-->   
</div>