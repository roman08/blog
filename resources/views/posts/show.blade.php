@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)
@section('content')
	  <article class="post container">
		@include($post->viewType())
	    <div class="content-post">

	      @include('posts.headers')

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
	          @include('posts.tags')
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
