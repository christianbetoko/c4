<div>
   	<!-- START FOOTER -->
		<div class="footer" style="background-image: url({{asset('assets/img/bg/footer.png')}});  background-size:cover;">
			<div class="container">		
				<div class="row footer_bg">						
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="footer_logo">
							<img src="{{asset('storage/'. $enterprise->logo_without_bg)}}" alt="{{ $enterprise->name }}" />
							{!! $enterprise->about !!}
						</div>
						<div>
							@if($enterprise->address)
								<span style="color: white"><i class="fa fa-map-marker"></i> <a href="">{{ $enterprise->address }}</a></span>
							@endif
							@if($enterprise->phone)
								<span style="color: white"><i class="fa fa-phone"></i> <a href="tel:{{ $enterprise->phone }}">{{ $enterprise->phone }}</a></span>
							@endif
							@if($enterprise->email)
								<span style="color: white"><i class="fa fa-envelope"></i> <a href="mailto:{{ $enterprise->email }}">{{ $enterprise->email }}</a></span>
							@endif
						</div>
						<div class="social_profile">
							<ul>
								@foreach ($socials as $social)
									<li><a href="{{ $social->url }}" class="" target="_blank"><i class="fa {{ $social->icon }}" title="{{ $social->name }}"></i></a></li>
								@endforeach
							</ul>
						</div>							
					</div><!--- END COL -->						
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>Liens rapides</h4>
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a></li>
								<li><a href="{{ route('blog') }}">Actualités</a></li>
								
							</ul>
						</div>
					</div><!--- END COL -->	
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>Liens utiles</h4>
							<ul>
								<li><a href="">FAQ</a></li>
								<li><a href="">Politique de confidentialité</a></li>
								<li><a href="">Conditions d'utilisation</a></li>
								
							</ul>
						</div>
					</div><!--- END COL -->	
					
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="newsletter-form">
							<h4>S'abonner à notre Newsletter</h4>
							 <form id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
								<div class="input-group input-group-lg newsletter">
									<input type="email" name="EMAIL" class="subscribe__input" placeholder="Adresse e-mail">
									<button type="submit" class="subs_btn">S'abonner</button>
								</div>
								
								<div id="mce-responses">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>
							</form>
						</div>
					</div><!--- END COL -->		
				</div><!--- END ROW -->		
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="footer_copyright">
							<p>&copy; 2026 Coalition des Congolais pour le Changement de la Constitution. Tous droits réservés.</p>
             
						</div>
					</div>
				</div>				
			</div><!--- END CONTAINER -->
		</div>
		<!-- END FOOTER -->	
</div>
