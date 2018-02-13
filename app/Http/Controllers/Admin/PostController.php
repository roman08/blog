<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Category;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = auth()->user()->posts;
        return view('admin.posts.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create')->with(compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        $this->validate($request, ['title' => 'required|min:3']);

        //$post = Post::create($request->only('title'));
        
        $post = Post::create($request->all());
       
        return redirect()->route('admin.post.edit', $post);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        //dd($request->all());
        //validaion
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
            'tags' => 'required'
            ]);
        $post = new Post;

        $post->title = $request->title;
        $post->url = str_slug($request->title);
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->published_at) : null;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->attach($request->tags);

        return back()->with('flash','Tu publicación ha sido creada');
               
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view',$post);

        return view('admin.posts.edit',[
                'post' => $post,
                'tags' => Tag::all(),
                'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('update',$post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));


        return redirect()->route('admin.post.edit', $post)->with('flash','Tu publicación ha sido guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();

        return redirect()->route('index.posts')->with('flash','La publicación ha sido eliminada');
    }
}
