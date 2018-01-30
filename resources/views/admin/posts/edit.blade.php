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
  <form action="{{ route('admin.post.update', $post) }}" method="post">
    {{ csrf_field()}}
    {{ method_field('PUT')}}
    <div class="col-md-8">
      <div class="box box-primary">
          <div class="box-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
              <label for="">Título de la Publicación</label>
              <input name="title" placeholder="Ingresa aquí el nombre de la publicación" type="text" class="form-control" value="{{ old('title', $post->title) }}">

              {!! $errors->first('title','<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
              <label for="">Contenido de la Publicación</label>
              <textarea name="body" id="editor" cols="2" rows="4" class="form-control" placeholder="Ingrese el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
              {!! $errors->first('body','<span class="help-block">:message</span>') !!}
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
              <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
            </div>
          </div>
          <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
            <label for="">Categorías</label>
            <select name="category" id="" class="form-control">
              <option value="">Selecciona una categoría</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id}}"
                {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
            {!! $errors->first('category','<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
            <label for="">Etiquetas</label>
            <select name="tags[]" class="form-control select2"
                  multiple="multiple" 
                  data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                  @foreach ($tags as $tag)
                    <option
                    {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                     value="{{ $tag->id}}">{{ $tag->name}}</option>
                  @endforeach
              </select>
            {!! $errors->first('tags','<span class="help-block">:message</span>') !!}

          </div>
          <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
              <label for="">Extracto de la Publicación</label>
              <textarea name="excerpt" id="excerpt" cols="2" rows="2" class="form-control" placeholder="Ingrese un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>

            {!! $errors->first('excerpt','<span class="help-block">:message</span>') !!}

          </div>
          <div class="form-group">
              <div class="dropzone"></div>
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

@push('styles')
    <!-- Dropzonecss -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/adminlte/css/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/css/select2.min.css">
@endpush

@push('scripts')
    <!-- DropzoneJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  <script src="/adminlte/js/bootstrap-datepicker.js"></script>
  <!-- Select2 -->
<script src="/adminlte/js/select2.full.min.js"></script>
  <script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.select2').select2();
    CKEDITOR.replace('editor');

    new Dropzone('.dropzone',{
        url:'/admin/posts/{{ $post->url }}/photos',
        headers: {
            'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
    });

    Dropzone.autoDiscover = false;
  </script>
@endpush






