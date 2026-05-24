<div>
    <section class="section-top" style="background-image: url({{ asset('assets/img/bg/section-top.png') }}); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-top-title">
                        <h1>Contactez la C4</h1>     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="address_area section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @if($enterprise)
                    <div class="col-lg-6 col-sm-6 col-xs-12 text-center">
                        <div class="single_address">
                            <h4>Siège National</h4>
                            <p class="mr_20">{{ $enterprise->address ?? 'Kinshasa, RDC' }}</p>
                            @if($enterprise->phone)
                                <p><a href="tel:{{ $enterprise->phone }}">{{ $enterprise->phone }}</a></p>
                            @endif
                            @if($enterprise->email)
                                <p><a href="mailto:{{ $enterprise->email }}">{{ $enterprise->email }}</a></p>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="col-lg-6 col-sm-6 col-xs-12 text-center">
                        <div class="single_address">
                            <h4>Coalition C4</h4>
                            <p class="mr_20">Kinshasa, République Démocratique du Congo</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div id="contact" class="contact_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title-white">Écrivez-nous</h2>
                <p class="section-title-white">Une question, une suggestion ou une demande d'information ? Laissez-nous un message.</p>
            </div>              
            
            <div class="row">                   
                <div class="offset-lg-1 col-lg-10 col-sm-12 col-xs-12 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="contact">
                        <form wire:submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom complet *">
                                    @error('name') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Votre adresse email *">
                                    @error('email') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Sujet de votre message *">
                                    @error('subject') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <textarea rows="6" wire:model="message" class="form-control @error('message') is-invalid @enderror" placeholder="Votre message... *"></textarea>
                                    @error('message') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="contact_btn" wire:loading.attr="disabled" wire:target="submitForm">
                                        <span wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                                        Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>              
        </div>
    </div>
    </div>