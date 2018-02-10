<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Photo;
class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(),[
            'photo' => 'required|image|max:2048']);
        //crear el link simbolico para las imagenes
        $post->photos()->create([
               'url'=> request()->file('photo')->store('posts','public')
            ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with('flash', 'Foto eliminada');
    }
}
