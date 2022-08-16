@extends('layout.admin')
@section('title',  'Admin :: Users')

@section('content')

<style>
.TableT{
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
} 
.TableOn tr:nth-child(even){
    background-color: #f2f2f2;
}

.TableOn tr:hover {
    background-color: rgb(159, 225, 255);
}

.TableT td, .TableT th {
    border-top : 1px solid #ddd;
    padding: 8px;
    font-size: 14px;
}

.TableT th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #83bfff;
    color: white;
    font-size: 16px;
}

</style>

@if (Auth::user()->roll === '4dm1n3t')


<div class="row">
	<div class="col-12">
		<div class="card h-100 mb-6">
			<div class="card-body pt-9 pb-0">

                    <table id="Users" class="table table-striped table-bordered TableOn" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Pais</th>
                                <th>Estado</th>
                                <th style="width: 1%">Fecha Creación</th>
                                <th>Actión</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $us)
                                <tr>
                                    <td>{{$us->nombre}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->perfil}}</td>
                                    <td>{{$us->pais}}</td>
                                    <td>{{$us->estado}}</td>
                                    <td>{{date_format(date_create($us->created_at), 'd/m/Y')}}</td>
                                    <td>
                                        <div class="del-user" data-lote="{{ $us->id }}"> 
                                            <img src="{{asset('assets/Icons/eliminar.png')}}" width="25">
                                        </div>
                                    </td>
                                </tr>                
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Pais</th>
                                <th>Estado</th>
                                <th>Fecha Creación</th>
                                <th>Actión</th>   
                            </tr>
                        </tfoot>
                    </table>
    
            </div>
        </div>
    </div>
</div>    
    
    </body>
    
    <script>
     
    $(document).ready(function() {

        $('#Users').DataTable();
    });
		$(".del-user").click(function() {

            var dt = $(this).attr("data-lote");

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({

                    title: 'DESEAS ELIMINAR TU CUENTA?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true

            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        type:"POST",
                        url: '{{ route('dell-users') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {"id" : dt },    
                        success: function (data) {
                            console.log(data);
                            console.log(data.name);		
                            if(data.state == "OK"){
                                
                                swalWithBootstrapButtons.fire(
                                    'ELIMINADA!',
                                    'Tu cuenta ha sido eliminada.',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //window.location.href = '{{route('logout')}}';
                                        location.reload();
                                    }
                                })			
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr);
                        }
                    });
                }
            })
        });

    
    </script>
    
@else
    <script>
        history.back();        
    </script>
@endif

    
@endsection

