<div>
    <section class="section-top" style="background-image: url({{ asset('assets/img/bg/section-top.png') }}); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-top-title">
                        <h1>Actualités</h1> 
                    </div>
                </div></div></div></section>
    <section class="blog-page section-padding">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    @forelse($posts as $post)
                        <div class="home_single_blog" wire:key="post-{{ $post->id }}">
                            @if($post->image_cover)
                                <img src="{{ asset('storage/' . $post->image_cover) }}" class="img-fluid" alt="{{ $post->title }}" />
                            @else
                                <img src="{{ asset('assets/img/blog/default.jpg') }}" class="img-fluid" alt="Image par défaut" />
                            @endif
                            
                            <div class="home_blog_content">
                                <div class="blog_title_info">
                                    <h2><a href="{{route('blog.single', ['category_slug' => $post->category->slug ?? null, 'slug' => $post->slug])}}">{{ $post->title }}</a></h2>
                                    <span>{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}</span>
                                    @if($post->category)
                                        <span><a href="#" wire:click.prevent="$set('selected_category', [{{ $post->category_id }}])">{{ $post->category->name }}</a></span>
                                    @endif
                                </div>
                                <p>{{ Str::limit(strip_tags($post->content), 150, '...') }}</p>
                                <a class="home_b_btn" href="{{ route('blog.single', ['category_slug' => $post->category->slug ?? null, 'slug' => $post->slug]) }}">Lire la suite</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info text-center">
                            Aucun article trouvé pour votre recherche ou cette catégorie.
                        </div>
                    @endforelse

                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
                    </div>
                </div><div class="col-lg-4 col-sm-12 col-xs-12">
                    
                    <div class="blog_search">
                        <input type="text" wire:model.live.debounce.300ms="searchTerm" class="form-control" placeholder="Rechercher un article...">
                    </div>
                    
                    <div class="latest_blog wow fadeInRight">
                        <h4 class="blog_sidebar_title">Articles Récents</h4>
                        @forelse($recent_posts as $recent)
                            <div class="single_latest_blog" wire:key="recent-{{ $recent->id }}">                            
                                <a href="{{ route('blog.single', ['category_slug' => $recent->category->slug ?? null, 'slug' => $recent->slug]) }}">
                                    <h4>{{ $recent->title }}</h4>
                                </a>                       
                            </div>
                        @empty
                            <p class="text-muted px-3">Aucun article récent.</p>
                        @endforelse
                    </div>

                    <div class="categories">
                        <h4 class="blog_sidebar_title">Catégories</h4>
                        <ul>
                            <li>
                                <a href="#" wire:click.prevent="$set('selected_category', [])" class="{{ empty($selected_category) ? 'text-danger font-weight-bold' : '' }}">
                                    <i class="ti-arrow-right"></i> Toutes les actualités
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="#" wire:click.prevent="$set('selected_category', [{{ $category->id }}])" class="{{ in_array($category->id, $selected_category) ? 'text-danger font-weight-bold' : '' }}">
                                        <i class="ti-arrow-right"></i> {{ $category->name }} 
                                        <span class="">({{ $category->posts->count() ?? '' }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>                  

                    

                    <div class="tag">
                        <h4 class="blog_sidebar_title">Mots-clés</h4>
                        <a href="#" wire:click.prevent="$set('searchTerm', 'Constitution')">Constitution</a>
                        <a href="#" wire:click.prevent="$set('searchTerm', 'Kabuya')">Kabuya</a>
                        <a href="#" wire:click.prevent="$set('searchTerm', 'Alliance')">Alliance</a>
                        <a href="#" wire:click.prevent="$set('searchTerm', 'C4')">C4</a>
                        <a href="#" wire:click.prevent="$set('searchTerm', 'RDC')">RDC</a>
                    </div>
                </div></div></div></section>
    </div>