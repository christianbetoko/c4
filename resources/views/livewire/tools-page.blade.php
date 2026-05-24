<div>
    <section class="section-top" style="background-image: url({{ asset('assets/img/bg/section-top.png') }}); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-top-title">
                        <h1>Boîte à Outils (Kits)</h1> 
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section id="portfolio" class="portfolio_area section-padding">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h2 class="section-title-white">Matériel de Mobilisation</h2>
                <p class="section-title-white">Téléchargez et partagez nos visuels officiels, documents juridiques et guides de terrain pour propager le message de la Coalition C4.</p>
            </div>  

            <div class="col-lg-12 text-center">
                <div class="portfolio_filter">
                    <ul>
                        <li class="{{ $selectedType === 'all' ? 'active' : '' }}" wire:click="$set('selectedType', 'all')">Tout voir</li>
                        <li class="{{ $selectedType === 'social_media' ? 'active' : '' }}" wire:click="$set('selectedType', 'social_media')">Réseaux Sociaux</li>
                        <li class="{{ $selectedType === 'print_material' ? 'active' : '' }}" wire:click="$set('selectedType', 'print_material')">Matériel de Terrain (Print)</li>
                        <li class="{{ $selectedType === 'reference_text' ? 'active' : '' }}" wire:click="$set('selectedType', 'reference_text')">Textes de Référence</li>
                    </ul>
                </div>
            </div>                  

            <div class="portfolio-grid">                                    
    <div class="row">                                    
        
        @forelse($resources as $resource)
            <div class="col-lg-4 col-sm-6 col-xs-12 mb-4" wire:key="resource-{{ $resource->id }}">
                <div class="c4-card" style="background: #231242; border-radius: 8px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); height: 100%;">
                    
                    <div class="single-gallery" style="position: relative; overflow: hidden; border-radius: 6px; height: 230px; background: #130329; margin-bottom: 0;">
                        @if($resource->thumbnail_path)
                            <img src="{{ asset('storage/' . $resource->thumbnail_path) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $resource->title }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                <i class="fa {{ $resource->type === 'reference_text' ? 'fa-file-text' : ($resource->type === 'print_material' ? 'fa-print' : 'fa-share-alt') }} fa-4x" style="color: #6F00FF;"></i>
                            </div>
                        @endif

                        <div class="gallery_enlarge_icon_wrapper">
                            @if($resource->thumbnail_path)
                                <a href="{{ asset('storage/' . $resource->thumbnail_path) }}" class="gallery_enlarge_icon" target="_blank"><i class="ti-eye"></i></a>
                            @endif
                        </div>
                    </div>
                    
                    <div class="text-left mt-3" style="position: relative; z-index: 10;">
                        <h4 class="text-white font-weight-bold" style="font-size: 1.1rem; margin-bottom: 5px; line-height: 1.4; min-height: 45px;">
                            {{ $resource->title }}
                        </h4>
                        
                        @if($resource->description)
                            <p class="text-muted small mb-3" style="color: #b0a3c4 !important; line-height: 1.3; min-height: 35px;">
                                {{ Str::limit($resource->description, 75) }}
                            </p>
                        @endif
                        
                        <div class="d-flex justify-content-between align-items-center small mt-2 mb-3" style="color: #8c7ba6;">
                            
                            <span><i class="fa fa-download mr-1"></i> {{ $resource->download_count }} tél.</span>
                        </div>
                        
                        <button wire:click="downloadResource({{ $resource->id }})" 
                                class="contact_btn text-" 
                                style="width: 100%; border-radius: 4px; padding: 12px; position: relative; z-index: 20; cursor: pointer !important;">
                            <i class="fa fa-download mr-2"></i> Télécharger le kit
                        </button>
                    </div>

                </div>
            </div>@empty
            <div class="col-lg-12 text-center py-5">
                <div class="text-muted">
                    <i class="fa fa-folder-open-o fa-3x mb-3" style="color: #007FFF;"></i>
                    <p class="text-white">Aucune ressource n'est encore disponible dans cette catégorie.</p>
                </div>
            </div>
        @endforelse

    </div></div>
        </div></section>
    </div>