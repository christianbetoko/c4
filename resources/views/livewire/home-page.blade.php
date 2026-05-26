<div>
   	<!-- START HOME -->
		<div id="kenburns_061" class="carousel slide ps_indicators_txt_icon ps_control_txt_icon data-bs-target kbrns_zoomInOut thumb_scroll_x swipe_x ps_easeOutQuart" data-ride="carousel" data-pause="hover" data-interval="10000" data-duration="2000">
			<!-- Wrapper For Slides -->
			<div class="carousel-inner" role="listbox">
				<!-- First Slide -->
                @if($sliders->isNotEmpty())
                @foreach($sliders as $slider)
				<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
					<!-- Slide Background -->
					<img src="{{asset('storage/' . $slider->image)}}" />
					<!-- Left Slide Text Layer -->
					<div class="kenburns_061_slide" data-animation="animated fadeInRight">
						
						<h1>{{$slider->name}}</h1>
						<h3>{{$slider->description}}</h3>
					@if($slider->link)
						<a href="{{$slider->link}}" target="_blank">En savoir plus</a>
					@endif
					</div><!-- /Left Slide Text Layer -->
				</div><!-- /item -->
				<!-- End of Slide -->
                @endforeach
                @endif
			
			</div><!-- End of Wrapper For Slides -->
			<button class="carousel-control-prev" type="button" data-bs-target="#kenburns_061" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#kenburns_061" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>		
		</div>
		<!-- END  HOME -->	
        <!-- START COUNTER -->
		{{-- <section data-stellar-background-ratio="0.3" class="counter_feature section-padding">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-1.png" alt="icon" />
							<h2 class="counter-num">32652</h2>
							<h4>Happy Customers</h4>
						</div>							
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-2.png" alt="icon" />
							<h2 class="counter-num">21821</h2>
							<h4>Project Done</h4>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-3.png" alt="icon" />
							<h2 class="counter-num">5660</h2>
							<h4>In Business</h4>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
						<div class="single-project single-project-mrnone">
							<img src="assets/img/icon/counter-4.png" alt="icon" />
							<h2 class="counter-num">11859</h2>
							<h4>Support Cases</h4>
						</div>					
					</div><!-- END COL -->
				</div><!--- END ROW -->
				<div class="row text-center">						
					<div class="col-lg-8 offset-lg-2 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="video_btn" style="background-image: url(assets/img/bg/video-bg.jpg);  background-size:cover; background-position: center center;">
							<a class="video-play" href="https://www.youtube.com/watch?v=alswD2tCc_Q"><i class="ti-video-clapper"></i></a>
						</div>	
					</div>						
				</div><!--- END ROW -->				
			</div><!--- END CONTAINER -->		
		</section> --}}
		<!-- END COUNTER-->	

	<!-- START COUNTER -->
		{{-- <section data-stellar-background-ratio="0.3" class="counter_feature section-padding">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-1.png" alt="icon" />
							<h2 class="counter-num">32652</h2>
							<h4>Happy Customers</h4>
						</div>							
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-2.png" alt="icon" />
							<h2 class="counter-num">21821</h2>
							<h4>Project Done</h4>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single-project">
							<img src="assets/img/icon/counter-3.png" alt="icon" />
							<h2 class="counter-num">5660</h2>
							<h4>In Business</h4>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
						<div class="single-project single-project-mrnone">
							<img src="assets/img/icon/counter-4.png" alt="icon" />
							<h2 class="counter-num">11859</h2>
							<h4>Support Cases</h4>
						</div>					
					</div><!-- END COL -->
				</div><!--- END ROW -->
				<div class="row text-center">						
					<div class="col-lg-8 offset-lg-2 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="video_btn" style="background-image: url(assets/img/bg/video-bg.jpg);  background-size:cover; background-position: center center;">
							<a class="video-play" href="https://www.youtube.com/watch?v=alswD2tCc_Q"><i class="ti-video-clapper"></i></a>
						</div>	
					</div>						
				</div><!--- END ROW -->				
			</div><!--- END CONTAINER -->		
		</section> --}}
		<!-- END COUNTER-->	
        	<!-- BLOG -->
		<section class="blog_area section-padding">
			<div class="container">
				<div class="section-title text-center">
					<h2>Dernières nouvelles</h2>
					<p>Restez informé des dernières actualités</p>
				</div>				
				<div class="row text-center">
                    @if($posts->isNotEmpty())
                    @foreach($posts as $post)
	<div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="home_single_blog">
							<img src="{{ asset('storage/' . $post->image_cover) }}" class="img-fluid" alt="{{ $post->title }}" />
							<div class="home_blog_content">
								<div class="blog_title_info">
									<h2><a href="{{route('blog.single', ['category_slug' => $post->category->slug ?? null, 'slug' => $post->slug])}}">{{ $post->title }}</a></h2>
									<span>{{ $post->published_at->diffForHumans() }}</span>
									<span><a href="">{{$post->category->name}}</a></span>
								</div>
								{!! Str::limit($post->content, 100) !!}
								<a class="home_b_btn" href="{{route('blog.single', ['category_slug' => $post->category->slug ?? null, 'slug' => $post->slug])}}">Lire plus</a>
							</div>
						</div>
					</div><!-- END COL -->	
                    @endforeach
                    @endif
							
											
				</div><!-- END ROW -->				
			</div><!--- END CONTAINER -->
		</section>
		<!-- END BLOG -->	
		<!-- TESTIMONIALS -->
		@if($individuals->isNotEmpty())
		<div class="testimonial_area section-padding">
			<div class="container">
				<div class="section-title text-center">
					<h2>Nos Motivations</h2>
					<p>Ce que disent les congolais sur le changement de constitution</p>
				</div>				
				<div class="row">					
					<div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12">
						<div class="row">
							@foreach($individuals as $individual)
							<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
								<div class="single_testimonial">
									@if ($individual->photo)
										<div class="testimonial_img">
											<img src="{{ asset('storage/' . $individual->photo) }}" alt="{{ $individual->name }}" class="img-fluid" />
										</div>
										
									@endif
									
									<p>{{ $individual->motivation }}</p>
									<h4>{{ $individual->name }} {{ $individual->lastname }} {{ $individual->firstname }}</h4>
									
								</div>
							</div><!-- END COL  -->		
								@endforeach						
						</div>
					</div>
				</div><!-- END ROW -->				
			</div><!--- END CONTAINER -->
		</div>
		@endif
		<!-- END TESTIMONIALS -->	
        <!-- START PARTNER LOGO -->
		<div class="partner-logo section-padding">
			<div class="container">										
				<div class="row text-center">
                    @if($partners->isNotEmpty())
                    @foreach($partners as $partner)
<div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single_logo single_logo_bm">
							<a href="{{ $partner->link }}" target="_blank">
								<img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="img-fluid"/>
							</a>
						</div>						
					</div><!--- END COL -->
                    @endforeach

                    @endif
					
					
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->	
		</div>
		<!-- END PARTNER LOGO -->
</div>
