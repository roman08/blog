<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {   
        //carga directamente la relacion en el metodo load
        //return $category->load('posts');
       // return $category->posts;
        return view('pages.home', [
            'title' => "Publicaciones de la categoría  $category->name ",
            'posts' => $category->posts()->paginate()
            ]);
    }
}
