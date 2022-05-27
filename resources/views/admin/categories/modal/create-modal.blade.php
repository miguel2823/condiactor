<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalCreate">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                        <div class="modal-body">
                            {!! Form::open(['route'=>'admin.categories.store','method'=>'POST'])  !!}
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

</form>
