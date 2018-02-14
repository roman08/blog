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

        $posts = Post::allowed()->get();
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
        $this->authorize('update',$post);

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
