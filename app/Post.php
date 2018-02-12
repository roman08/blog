<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 
        ];
    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
    	return 'url';
    }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    //Relacion muchos a muchos
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now())
                ->latest('published_at');

    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

            //mutador

    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $url = str_slug($title);
        $duplicatUrlCount = Post::where('url','LIKE', "{$url}%")->count();
        if($duplicatUrlCount)
        {
            $url .= "-". ++$duplicatUrlCount;
        }
        $this->attributes['url'] = $url;

    }*/

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] =  $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribut($category)
    {
        $this->attributes['category_id'] = Category::find($category) 
                                ? $category
                                : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagsIds = collect($tags)->map(function($tag){
            return  Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        $this->tags()->sync($tagsIds);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public static function create(array $attributes = []){
        
        $post = static::query()->create($attributes);

        $post->generateUrl();
        

        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);
        if ($this->whereUrl($url)->exists()) {
            $url = "{$url}-{$this->id}";
        }
        
        $this->url = $url;
        
        $this->save();
    }
}
