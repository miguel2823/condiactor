<form action="{{route('admin.categories.destroy',$category)}}" class="formulario-eliminar" method="POST">
    @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('eliminar')=='ok')
            Swal.fire(
                'Eliminado!',
                'Se elimino con exito.',
                'success'
                )
    @endif
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