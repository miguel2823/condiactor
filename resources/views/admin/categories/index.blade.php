@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Categorías
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreate">{{__('CREAR')}}</a>
    </h1>
        @include('admin.categories.modal.create-modal')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

{{-- @section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
        
    @endif

    <div class="card">
        <div class="">
            <div class="card-header">
                <a class="btn btn-secondary" href="{{route('admin.categories.create')}}">Agregar Categoria</a>
            </div>
            <div class="d-flex justify-content-end">
                {{  $categories->links()}}
            </div>
        </div>    
        <div class="card-body">
            <div>
              
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit',$category)}}">Edit</a></td>
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            
                            
                        @endforeach    
                    </tbody>   
                </table>
            </div>
        </div>
    </div>
@stop
--}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
                
            <!-- /.card-header -->
            <div class="card-body">
            
                <table id="cate" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>                        
                            <th></th>
                            <th></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td id="name">{{$category->id}}</td>
                                <td id="slug">{{$category->name}}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm " href="#" data-toggle="modal" data-target="#ModalEdit{{$category->id}}">
                                Editar</a></td>
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy',$category)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form> 
                                </td>
                            </tr>
                            @include('admin.categories.modal.editar-modal')
                            
                        @endforeach    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>   
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
    <div class="modal fade" id="modal-create-category">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                        <div class="modal-body">
                            {!! Form::open(['route'=>'admin.categories.store'])  !!}
                           {{--  <div class="mb-3 form-floating">
                                {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingresar el nombre']) !!}
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                {!! Form::label('slug', 'Slug') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingresar el slug']) !!}
                            @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div> --}}

                            <div class="mb-3 form-floating">        
                                <input type="text" class="form-control" id="name" name="name" placeholder="usuario">        
                                <label for="nombre" class="form-label">nombre:</label>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">        
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="usuario">        
                                <label for="nombre" class="form-label">slug:</label>
                                @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            
                        {{--   {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!} --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button id="btn1" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<div class="modal fade" id="modal-actualizar-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                    <div class="modal-body">
                        {!! Form::open(['route'=>'admin.categories.store'])  !!}
                       {{--  <div class="mb-3 form-floating">
                            {!! Form::label('name', 'Nombre', ['class'=>'form-label']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingresar el nombre']) !!}
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingresar el slug']) !!}
                        @error('slug')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div> --}}

                        <div class="mb-3 form-floating">        
                            <input type="text" class="form-control" id="name" name="name" placeholder="usuario">        
                            <label for="nombre" class="form-label">nombre:</label>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">        
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="usuario">        
                            <label for="nombre" class="form-label">slug:</label>
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        
                    {{--   {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!} --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="btn1" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop
@section('js')
 {{-- PARA EL DATATABLE --}}
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    {{-- PARA EL MENSAJE MODAL --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        /* MENSAJE DE CONFIRMACION DE ELIMINAR */
        @if (session('eliminar')=='ok')
                Swal.fire(
                    'Eliminado!',
                    'Se elimino con exito.',
                    'success'
                    )
        @endif
     /*    MENSAJE DE CONFIRMACION DE REGISTRAR */
        @if (session('registrar')=='ok')
                Swal.fire(
                    'Guardado!',
                    'Se realizo con exito.',
                    'success'
                    )
        @endif
            /* MENSAJE DE CONFIRMACION DE ELIMINACION */
        @if(session('actualizar')=='ok')
            Swal.fire(
                'Actualizado',
                'Se realizo con exito',
                'success'
            )
        @endif
        /* TABLA DINAMICA DATATABLE */
        $('#cate').DataTable({
            responsive:true,
            autoWidth:false
        });
       /*  {{-- PARA EL MENSAJE MODAL --}} */
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas Seguro?',
            text: "Este registro de usuario se eliminara definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            CancelButtonText: 'cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
        
    </script>

@stop