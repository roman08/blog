<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="{{ route('admin.post.store') }}" method="post">
    {{ csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega el título de tu nueva publicación</h4>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
              {{-- <label for="">Título de la Publicación</label> --}}
              <input name="title" placeholder="Ingresa aquí el nombre de la publicación" type="text" class="form-control" value="{{ old('title') }}" required="">

              {!! $errors->first('title','<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button t class="btn btn-primary">Crear publicación</button>
        </div>
      </div>
    </div>
  </form>
</div>