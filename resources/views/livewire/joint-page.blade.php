<div>
     <section class="section-top" style="background-image: url({{ asset('assets/img/bg/section-top.png') }}); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-top-title">
                        <h1>Rejoindre la coalition</h1> 
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <div id="contact" class="contact_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title-white">Formulaire d'Engagement C4</h2>
                <p class="section-title-white">Prenez part à l'histoire. Choisissez votre mode d'adhésion pour rejoindre la dynamique.</p>
            </div>              
            
            <div class="row">                   
                <div class="offset-lg-1 col-lg-10 col-sm-12 col-xs-12 text-center">
                    
                    <div class="d-flex justify-content-center mb-5" style="gap: 15px;">
                        <button type="button" 
                                wire:click="$set('membership_type', 'individual')" 
                                class="btn btn-lg {{ $membership_type === 'individual' ? 'btn_one' : 'btn-outline-light' }}"
                                style="padding: 12px 30px; font-weight: bold; border-radius: 30px; transition: all 0.3s ease;">
                            <i class="fa fa-user mr-2"></i> Adhésion Individuelle
                        </button>
                        
                        <button type="button" 
                                wire:click="$set('membership_type', 'organization')" 
                                class="btn btn-lg {{ $membership_type === 'organization' ? 'btn_one' : 'btn-outline-light' }}"
                                style="padding: 12px 30px; font-weight: bold; border-radius: 30px; transition: all 0.3s ease;">
                            <i class="fa fa-users mr-2"></i> Adhésion Organisation / Structure
                        </button>
                    </div>

                    <div class="contact">
                        
                        @if($membership_type === 'individual')
                            <form wire:submit.prevent="submitIndividual" class="wow fadeInUp" data-wow-duration="0.5s">
                                <div class="row">
                                   
                                    <div class="form-group col-md-12 text-left">
                                          @if ($photo)
        <div class="mt-3 text-center">
            <span class="text-white small d-block mb-2">Aperçu de votre image :</span>
            <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
        </div>
                                      @endif
    <label class="text-white font-weight-bold mb-1">Votre Photo (Optionnel)</label>
    <p class="text-muted small style-text-mutation" style="color: #ccc !important; margin-top: -5px; margin-bottom: 10px;">
        Ajoutez votre photo pour figurer dans l'annuaire des visages de la dynamique (Format JPG/PNG, max 4Mo).
    </p>
    
    <div class="custom-file-upload-wrapper">
        <input type="file" wire:model="photo" class="form-control text-white @error('photo') is-invalid @enderror" id="upload{{ $iteration }}" />
     
        <div wire:loading wire:target="photo" class="text-info small">
                                            <i class="fa fa-spinner fa-spin"></i> Transfert du fichier en cours...
                                        </div>
        @error('photo') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
    </div>

   
</div>
                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Votre Nom  *">
                                        @error('name') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>
                                     <div class="form-group col-md-12">
                                        <input type="text" wire:model="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Votre Postnom (Optionnel)">
                                        @error('lastname') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>
                                     <div class="form-group col-md-12">
                                        <input type="text" wire:model="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Votre Prénom *">
                                        @error('firstname') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <select wire:model="gender" class="form-control @error('gender') is-invalid @enderror" style="height: 50px; background: #fff;">
                                            <option value="">Sélectionnez le sexe *</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                        @error('gender') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-12">
    <label class="text-white d-block text-left small mb-1">Date de naissance *</label>
    <input type="date" wire:model="birth_date" class="form-control @error('birth_date') is-invalid @enderror" max="{{ now()->subYears(18)->format('Y-m-d') }}">
    @error('birth_date') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
</div>

                                    <div class="form-group col-md-12">
                                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse Email (Optionnel)">
                                        @error('email') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de Téléphone (Optionnel)">
                                        @error('phone') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
        <label class="text-white d-block text-left small mb-1">Province *</label>
      <select wire:model.live="province_id" class="form-control @error('province_id') is-invalid @enderror" style="height: 50px; background: #fff;">
    <option value="">Sélectionnez...</option>
     <option value="27">Diaspora</option><hr>
        @foreach ($provinces as $province)
       <option value="{{ $province->id }}">{{ $province->name }}</option>
   @endforeach
       
    
</select>
        @error('province_id') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
    </div>
                                    <div class="form-group col-md-12">
        @if($province_id == 27)
            <label class="text-white d-block text-left small mb-1">Pays de résidence (Optionnel)</label>
            <input type="text" wire:model="country_residence" class="form-control @error('country_residence') is-invalid @enderror" placeholder="Ex: France, Belgique, USA">
            @error('country_residence') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
        @else
            <label class="text-white d-block text-left small mb-1">Commune / Ville / Territoire (Optionnel)</label>
            <input type="text" wire:model="city_district" class="form-control @error('city_district') is-invalid @enderror" placeholder="Ex: Limete, Kolwezi">
            @error('city_district') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
        @endif
    </div>

    <div class="form-group col-md-12">
        <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Avenue, Numéro, Quartier (Optionnel)">
        @error('address') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
    </div>

                                    <div class="form-group col-md-12">
                                        <textarea rows="5" wire:model="motivation" class="form-control @error('motivation') is-invalid @enderror" placeholder="Exprimez vos motivations en tant que citoyen engagé... *"></textarea>
                                        @error('motivation') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>
<div class="form-group col-md-12">
    <label class="text-white font-weight-bold mb-1">Langue de préférence (Optionnel)</label>
    <p class="text-muted small" style="color: #ccc !important; margin-top: -5px; margin-bottom: 10px;">
        Sélectionnez la langue dans laquelle vous souhaitez recevoir nos messages d'information et kits de sensibilisation.
    </p>
    
    <select wire:model="preferred_language" class="form-control @error('preferred_language') is-invalid @enderror" style="height: 50px; background: #fff;">
        <option value="">Sélectionnez une langue...</option>
       
        <option value="ln">Lingala</option>
        <option value="sw">Kiswahili</option>
        <option value="lu">Tshiluba</option>
        <option value="kg">Kikongo</option>
         <option value="fr">Français</option>
          <option value="en">Anglais</option>
    </select>
    @error('preferred_language') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
</div>
                         
<div class="col-md-12 text-center form-group">
    <br>
                                        <button type="submit" class="contact_btn" wire:loading.attr="disabled" wire:target="submitIndividual">
                                            <span wire:loading wire:target="submitIndividual" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                                            S'engager à titre individuel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif

                        @if($membership_type === 'organization')
                            <form wire:submit.prevent="submitOrganization" class="wow fadeInUp" data-wow-duration="0.5s">
                                <div class="row">
                                       
                                    <div class="form-group col-md-12 text-left">
                                        @if ($logo)
        <div class="mt-3 text-center">
            <span class="text-white small d-block mb-2">Aperçu de votre image :</span>
            <img src="{{ $logo->temporaryUrl() }}" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
        </div>
                                      @endif
    <label class="text-white font-weight-bold mb-1">Votre Logo (Optionnel)</label>
    <p class="text-muted small style-text-mutation" style="color: #ccc !important; margin-top: -5px; margin-bottom: 10px;">
        Ajoutez votre logo  (Format JPG/PNG, max 4Mo).
    </p>
    
    <div class="custom-file-upload-wrapper">
        <input type="file" wire:model="logo" class="form-control text-white @error('logo') is-invalid @enderror" id="upload{{ $iteration }}" />
     
        <div wire:loading wire:target="logo" class="text-info small">
                                            <i class="fa fa-spinner fa-spin"></i> Transfert du fichier en cours...
                                        </div>
        @error('logo') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
    </div>
                                    </div>

                                    <div class="form-group col-md-12">
                               @if ($letter)
    <span class="text-white small d-block mb-2">
        Votre document : <strong>{{ $letter->getClientOriginalName() }}</strong>
    </span>
@endif
                                        <label class="text-white font-weight-bold mb-1">Lettre officiel d'engagement</label>
    <p class="text-muted small style-text-mutation" style="color: #ccc !important; margin-top: -5px; margin-bottom: 10px;">
       Veuillez joindre la lettre officielle d'engagement signée par le représentant légal ou le PV de votre organisation  (Format PDF,JPG ou PNG, max 4Mo).
    </p>
                                        <div class="custom-file-upload-wrapper">
        <input type="file" wire:model="letter" class="form-control text-white @error('letter') is-invalid @enderror" id="upload{{ $iteration }}" />
     
        <div wire:loading wire:target="letter" class="text-info small">
                                            <i class="fa fa-spinner fa-spin"></i> Transfert du fichier en cours...
                                        </div>
        @error('letter') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
    </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="organization_name" class="form-control @error('organization_name') is-invalid @enderror" placeholder="Nom de l'Organisation / Parti politique *">
                                        @error('organization_name') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <select wire:model="organization_type" class="form-control @error('organization_type') is-invalid @enderror" style="height: 50px; background: #fff;">
                                            <option value="">Sélectionnez le type de structure *</option>
                                            <option value="parti_politique">Parti Politique</option>
                                            <option value="ong">ONG / Association</option>
                                            <option value="mouvement_citoyen">Mouvement Citoyen</option>
                                            <option value="syndicat">Syndicat / Regroupement</option>
                                            <option value="autre">Autre structure</option>
                                        </select>
                                        @error('organization_type') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    <br>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="organization_owner" class="form-control @error('organization_owner') is-invalid @enderror" placeholder="Nom du Représentant officiel *">
                                        @error('organization_owner') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="email" wire:model="organization_email" class="form-control @error('organization_email') is-invalid @enderror" placeholder="Email officiel de la structure ">
                                        @error('organization_email') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="organization_phone" class="form-control @error('organization_phone') is-invalid @enderror" placeholder="Téléphone de contact / WhatsApp *">
                                        @error('organization_phone') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="text" wire:model="organization_province" class="form-control @error('organization_province') is-invalid @enderror" placeholder="Siège principal / Province ">
                                        @error('organization_province') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea rows="5" wire:model="organization_motivation" class="form-control @error('organization_motivation') is-invalid @enderror" placeholder="Décrivez les motivations de votre structure et son apport potentiel à la coalition C4... *"></textarea>
                                        @error('organization_motivation') <span class="invalid-feedback text-left d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="contact_btn" wire:loading.attr="disabled" wire:target="submitOrganization">
                                            <span wire:loading wire:target="submitOrganization" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                                            Enregistrer notre structure
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div></div></div></div>
    </div>