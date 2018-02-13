 <div class="tags container-flex">
    @foreach($post->tags as $tag)
        <span class="tag c-gray-1 text-capitalize"><a href="{{ route('tag.show',$tag) }}">#{{ $tag->name }}</a></span>
    @endforeach
</div>