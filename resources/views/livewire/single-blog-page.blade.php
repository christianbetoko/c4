@section('title', $post->title . ' | C4')

@section('meta_tags')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta property="og:image" content="{{ asset('storage/'.$post->image_cover) }}">
    <meta property="og:type" content="article">

    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/'.$post->image_cover) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
<div>
    <section class="section-top" style="background-image: url({{ asset('assets/img/bg/section-top.png') }}); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-top-title">
                        <h1> {{ $post->title }}</h1>      
                    </div>
                </div></div></div></section>
    <section class="blog-page section-padding">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="post-slide-blog">
                        <h2 class="mb-3 font-weight-bold" style="font-size: 2.5rem; color: #111;">
                            {{ $post->title }}
                        </h2>
                        
                        <div class="blog-meta mb-4 text-muted d-flex flex-wrap align-items-center" style="font-size: 0.9rem;">
                            <span class="mr-3">
                                <i class="fa fa-calendar"></i> 
                                Publié le {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
                            </span>
                            <spacer class="mx-2">|</spacer>
                           <div class="share-area">
                                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm transition-all" 
                                        id="shareBtn"
                                        data-title="{{ $post->title }}" 
                                        data-url="{{ url()->current() }}">
                                    <i class="bi bi-share-fill me-1"></i> Partager
                                </button>
                            </div>
                        </div>

                        <div class="blog-img bc_bottom mb-4">
                            @if($post->image_cover)
                                <img src="{{ asset('storage/' . $post->image_cover) }}" class="img-fluid rounded w-100" alt="{{ $post->title }}" style="max-height: 500px; object-fit: cover;" />
                            @else
                                <img src="{{ asset('assets/img/blog/default-large.jpg') }}" class="img-fluid rounded w-100" alt="Image par défaut" />
                            @endif
                        </div>

                        <div class="blog-main-content entry-content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                            {!! $post->content !!}
                        </div>
                    </div>

                   

                    <div class="comments-container mt-5">
                        <livewire:comment-section :postId="$post->id"/> 
                    </div>
                </div>
            </div>
        </section>
    </div>

<style>
    /* Animation et style du bouton partager */
    #shareBtn {
        transition: all 0.3s ease;
        border: none;
        background: linear-gradient(45deg, #0d6efd, #0a58ca);
    }

    #shareBtn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4) !important;
    }

    .content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
</style>

<script>
    document.getElementById('shareBtn').addEventListener('click', async function() {
        const title = this.getAttribute('data-title');
        const url = this.getAttribute('data-url');

        // 1. Essayer le partage natif (Mobile / Navigateurs récents)
        if (navigator.share) {
            try {
                await navigator.share({
                    title: title,
                    url: url
                });
            } catch (err) {
                console.log("Partage annulé ou erreur");
            }
        } 
        // 2. Fallback : Copier le lien si le partage natif n'existe pas
        else {
            try {
                await navigator.clipboard.writeText(url);
                
                // Feedback visuel sur le bouton
                const originalHTML = this.innerHTML;
                this.classList.replace('btn-primary', 'btn-success');
                this.innerHTML = '<i class="bi bi-check-lg"></i> Lien copié !';
                
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.classList.replace('btn-success', 'btn-primary');
                }, 2500);
            } catch (err) {
                alert("Impossible de copier le lien automatiquement. Voici l'URL : " + url);
            }
        }
    });
</script>