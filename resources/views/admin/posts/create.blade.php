@extends('admin.layout')

@section('header')
<h1>
  Posts
  <small>Crear publicación</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ route('index.posts') }}"><i class="fa fa-dashboard"></i> Post</a></li>
  <li class="active">Crear</li>
</ol>
@endsection

@section('content')
<div class="row">
  <form action="">
    <div class="col-md-8">
      <div class="box box-primary">
          <div class="box-body">
            <div class="form-group">
              <label for="">Título de la Publicación</label>
              <input name="title" placeholder="Ingresa aquí el nombre de la publicación" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Contenido de la Publicación</label>
              <textarea name="body" id="body" cols="2" rows="4" class="form-control" placeholder="Ingrese el contenido completo de la publicación"></textarea>
            </div>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group">
            <label for="">Fecha de publicación</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input name="publised_at" type="text" class="form-control pull-right" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label for="">Categorías</label>
            <select name="" id="" class="form-control">
              <option value="">Selecciona una categoría</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="">Extracto de la Publicación</label>
              <textarea name="excerpt" id="excerpt" cols="2" rows="2" class="form-control" placeholder="Ingrese un extracto de la publicación"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
          </div>
        </div>
      </div>
    </div> 
  </form>
</div>
@endsection