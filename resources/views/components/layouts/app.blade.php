<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ $title ?? 'Page Title' }}</title>
       
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="C4 - Coalition des Congolais pour le Changement de la Constitution">
		<meta name="keywords" content="C4, Coalition, Congolais, Changement, Constitution, RDC">		
		<!-- SITE TITLE -->
				 <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon">
		<!-- Latest Bootstrap min CSS -->
		<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">		
		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800"> 
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600">			
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/fonts/themify-icons.css')}}">
		<!--- owl carousel Css-->
		<link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.css')}}">
		<!--materialdesignicons Css-->
        <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/materialdesignicons.min.css')}}">
		<!-- animate CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">		
		<!-- Venobox CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/venobox.css')}}">			
		<!-- MAGNIFIC CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">					
		<!-- Style CSS -->						
		<link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">	
		<link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">			
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">					
		<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">			
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        @if(View::hasSection('meta_tags'))
        @yield('meta_tags')
    @else
        {{-- Valeurs par défaut (ex: Accueil) --}}
        <meta property="og:title" content="C4">
        <meta property="og:description" content="Coalition des Congolais pour le Changement de la Constitution">
        <meta property="og:image" content="{{asset('assets/img/logo.png')}}">
        <meta name="twitter:image" content="{{asset('assets/img/logo.png')}}">
    @endif
         @livewireStyles
    </head>
    <body data-spy="scroll" data-offset="80">
        <!-- START PRELOADER -->
		<div class="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
		<!-- END PRELOADER -->	
        <livewire:components.header />
        {{ $slot }}
        <livewire:components.footer />

        	<!-- Latest jQuery -->
			<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
		<!-- Latest compiled and minified Bootstrap -->
			<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- modernizer JS -->		
			<script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>																		
		<!-- owl-carousel min js  -->
			<script src="{{ asset('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>					
		<!-- magnific-popup js -->               
			<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>			
		<!-- jquery mixitup js -->   
			<script src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>			
		<!-- jquery appear js -->
			<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>							
		<!-- countTo js -->
			<script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>
		<!-- jquery touchSwipe min JS -->
			<script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>
				
		<!-- stellar js -->
			<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>			
		<!-- WOW - Reveal Animations When You Scroll -->
			<script src="{{ asset('assets/js/wow.min.js') }}"></script>	
		<!-- form contact js -->																				
			<script src="{{ asset('assets/js/form-contact.js') }}"></script>				
		<!-- scrolltopcontrol js -->
			<script src="{{ asset('assets/js/menu.js') }}"></script>																				
			<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>																				
			<script src="{{ asset('assets/js/scrolltopcontrol.js') }}"></script>																				
		<!-- scripts js -->
			<script src="{{ asset('assets/js/scripts.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
             @livewireScripts
    </body>
</html>
