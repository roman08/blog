@extends('admin.layout')


@section('header')
<h1>
	Posts
	<small>Listado</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Post</li>
</ol>
@endsection

@section('content')
	          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de publicaciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Extrato</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->excerpt }}</td>
							<td>
								<a href="" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
								<a href="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->	
@endsection


@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/css/dataTables.bootstrap.css">
@endpush

@push('scripts')
  <!-- DataTables -->
<script src="/adminlte/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/js/dataTables.bootstrap.min.js"></script>
@endpush
