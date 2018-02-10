<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Tag;
use App\Post;
use App\Category;
use  Carbon\Carbon;
use App\User;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
    	Category::truncate();
        User::truncate();
        Tag::truncate();
        User::create([
        'name' => 'Varekay',
        'email' => 'rmcentinela@gmail.com',
        'password' => bcrypt('123456'),
        ]);

    	$category = new Category;

    	$category->name = 'Categoria 1';
    	$category->save();

    	$category = new Category;

    	$category->name = 'Categoria 2';
    	$category->save();


        $post = new Post;

        $post->title = 'Mi primer post';
        $post->url = str_slug('Mi primer post');
        $post->excerpt = 'Extracto de mi primer post';
        $post->body = '<p>Contenido de mi primer post</p>';
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));

        $post = new Post;

        $post->title = 'Mi segundo post';
        $post->url = str_slug('Mi segundo post');
        $post->excerpt = 'Extracto de mi segundo post';
        $post->body = '<p>Contenido de mi segundo post</p>';
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));

        $post = new Post;

        $post->title = 'Mi tercer post';
        $post->url = str_slug('Mi tercer post');
        $post->excerpt = 'Extracto de mi tercer post';
        $post->body = '<p>Contenido de mi tercer post</p>';
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));

        $post = new Post;

        $post->title = 'Mi cuarto post';
        $post->url = str_slug('Mi cuarto post');
        $post->excerpt = 'Extracto de mi cuarto post';
        $post->body = '<p>Contenido de mi cuarto post</p>';
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4']));
    }
}
