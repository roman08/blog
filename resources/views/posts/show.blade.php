@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)
@section('content')
	  <article class="post container">
	  	@if ($post->photos->count() === 1)
                    <figure><img src="/storage/{{$post->photos->first()->url}}" alt="" class="img-responsive"></figure>
                @elseif($post->photos->count() > 1)
                    @include('posts.carousel')
                @elseif($post->iframe)
                    <div class="video">
                        {!! $post->iframe !!}
                    </div>
                @endif
	    <div class="content-post">
	      <header class="container-flex space-between">
	        <div class="date">
	          <span class="c-gris">{{ optional($post->published_at)->format('M d') }}</span>
	        </div>
	        @if($post->category)
		        <div class="post-category">
		          <span class="category">{{ $post->category->name }}</span>
		        </div>
		     @endif
	      </header>
	      <h1>{{ $post->title }}</h1>
	        <div class="divider"></div>
	        <div class="image-w-text">
	          {!! $post->body !!}
	        </div>

	        <footer class="container-flex space-between">
	          <div class="buttons-social-media-share">
	            <ul class="share-buttons">
	              
	              <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&t={{ $post->title }}" title="Compartir en Facebook" target="_blank"><img alt="Compartit en Facebook" src="/img/flat_web_icon_set/Facebook.png"></a></li>
	              
	              <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $post->title }}&via=varekay88&hashtags=Zemdero" target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a></li>
	              
	              <li><a href="https://plus.google.com/share?url={{ request()->fullUrl() }}" target="_blank" title="Compartit en Google+"><img alt="Share on Google+" src="/img/flat_web_icon_set/Google-plus.png"></a></li>
	              
	              <li><a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $post->title }}" target="_blank" title="Pin it"><img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png"></a></li>
	            
	            </ul>
	          </div>
	          <div class="tags container-flex">
	            @foreach($post->tags as $tag)
                    <span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>
                @endforeach
	          </div>
	      </footer>
	      <div class="comments">
	      <div class="divider"></div>
	        <div id="disqus_thread"></div>
			@include('partials.disqus-script')                    
	      </div><!-- .comments -->
	    </div>
	  </article>
@endsection

@push('styles')
	<link rel="stylesheet" href="/css/twitter-bootstrap.css">
@endpush


@push('scripts')
	<script
			  src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
	<script src="/js/twitter-bootstrap.js"></script>
	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush
