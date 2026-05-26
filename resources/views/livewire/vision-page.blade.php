<div>
   <!-- START SECTION TOP -->
		<section class="section-top" style="background-image: url(assets/img/bg/section-top.png);background-size:cover; background-position: center center;">
			<div class="container">
				<div class="row">
				  <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
					<div class="section-top-title">
						<h1>Vision</h1>		
					</div>
				  </div><!--- END COL -->				  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END SECTION TOP -->

		<!-- ABOUT PAGE -->
		<section class="about_page_area">
			<div class="container">				
				<div class="row text-center">					
					<div class="offset-lg-1 col-lg-10 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single_about_content">
							<h2>{{$enterprise->name}}</h2>
							{!!$enterprise->about!!}
						</div>
					</div><!-- END COL -->					
				</div><!-- END ROW -->				
			</div><!--- END CONTAINER -->
		</section>
		<!-- END ABOUT PAGE -->
</div>
