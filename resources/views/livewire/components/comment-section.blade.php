<div>
    <div class="comments_part">
        <h3 class="blog_head_title">Commentaires ({{ $comments->count() }})</h3>
        
        @forelse($comments as $comment)
            <div class="single_comment @if($loop->last) single_comment_mbnone @endif" wire:key="comment-{{ $comment->id }}">
                <img src="{{ asset('assets/img/blog/author.jpg') }}" alt="Avatar" />
                <h4>{{ $comment->user_name }}</h4>
                <span class="text-muted small" style="display: block; margin-top: -10px; margin-bottom: 10px;">
                    Le {{ \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d F Y à H:i') }}
                </span>
                <p>{{ $comment->content }}</p>
            </div>@empty
            <div class="alert alert-light text-center text-muted">
                Soyez le premier à laisser un commentaire sur cet article.
            </div>
        @endforelse
    </div><div class="comment_form">
        <h3 class="blog_head_title">Laisser un commentaire</h3>
        <div class="contact comment-box">
            <form wire:submit.prevent="postComment">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom complet *">
                        @error('name') 
                            <span class="invalid-feedback">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Votre adresse e-mail *">
                        @error('email') 
                            <span class="invalid-feedback">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-12">
                        <textarea rows="6" wire:model="content" class="form-control @error('content') is-invalid @enderror" placeholder="Écrivez votre commentaire ici... *"></textarea>
                        @error('content') 
                            <span class="invalid-feedback">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <div class="actions">
                            <button type="submit" class="btn btn-lg btn_one" wire:loading.attr="disabled">
                                <span wire:loading wire:target="postComment" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                                Soumettre le commentaire
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>