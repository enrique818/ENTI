@extends('layout.profile')
@section('title',  "Proyectos propuestos")

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
    h1{
        text-align:center;
        color: white;
	
    }
     h2{
        text-align:center;
        color:#622d6f;
    }
    
</style>

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header" id="kt_chat_messenger_header">
				<div class="card-title">
				<div class="d-flex justify-content-center flex-column me-3">
					<a href="{{route('user.show', ['user' => $user->id])}}" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$user->nombre}} <img src="{{asset($user->img)}}" alt="image" width="25" height="25"/></a> 
				</div>
			</div>
		</div>
			<div class="card-header">
				<h3 class="card-title">Proyectos propuestos</h3>
			</div>		
			<div class="card-footer">
				<form id="data" method="POST" action="" class="axios-form" accept-charset="utf-8">					
                    <x-input  name="precio_oferta" label="Precio de la oferta" :required="false" :value="auth()->user()->precio"/>
                    <x-textarea name="descripcion_proyecto" label="Descripción del proyecto"  :required="false" :value="auth()->user()->descripcion"/>
                    <x-textarea name="plazo_proyecto" label="Plazo estimado del proyecto"  :required="false" :value="auth()->user()->plazo"/>
							</form>		
				<div class="mt-5">
					  <button type="submit"  data-toggle="modal" data-target="#ofertaModal" class="btn btn-primary">Editar</button>
					  <!-- Modal -->
					  <div class="modal fade" id="ofertaModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>	 
							<form id="data" method="POST" action="{{route('user.information')}}" class="axios-form" accept-charset="utf-8">
								@csrf
								@method('PUT')
							<div class="modal-body">				
								<x-input name="precio" label="Precio de la oferta" :required="false" :value="auth()->user()->precio" />
								@error('precio_oferta')
								<small style="color:red">{{ $message }}</small>
								@enderror
								<x-textarea name="descripcion" label="Descripción del proyecto" cols="20" rows="10" :required="false" :value="auth()->user()->descripcion"/>
								@error('descripcion_proyecto')
								<small style="color:red">{{ $message }}</small>
								@enderror
								<x-textarea name="plazo" label="Plazo estimado del proyecto" :required="false" :value="auth()->user()->plazo"/>
								@error('plazo_proyecto')
								<small style="color:red">{{ $message }}</small>
								@enderror
								</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							  <button type="submit"  id="btnresult" class="btn btn-primary">Guardar</button>
							</div>
						</form>
						  </div>
						</div>
					  </div>
			</div>
			</div>			
		</div>
	</div>
</div>
@endsection

@push('js-scripts')
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>

@endpush