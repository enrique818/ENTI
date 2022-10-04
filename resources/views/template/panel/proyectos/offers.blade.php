@extends('layout.profile')
@section('title',  "Ofertas recibidas")

@section('content')


@for($i=1; $i<3; $i++)	
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
				<h3 class="card-title">Ofertas recibidas</h3>				
			</div>					
			<div class="card-footer">
				<form id="data" method="POST" action="{{route('user.information')}}" class="axios-form" accept-charset="utf-8">
					@csrf
					@method('PUT')					
					<x-input  name="precio_oferta" label="Precio de la oferta" :required="false" :value="auth()->user()->precio"/>
						<x-textarea name="descripcion_proyecto" label="Descripción del proyecto"  :required="false" :value="auth()->user()->descripcion"/>
						<x-textarea name="plazo_proyecto" label="Plazo estimado del proyecto"  :required="false" :value="auth()->user()->plazo"/>
							<button type="submit" class="btn btn-rosa mx-1">Aceptar</button>
							<button type="submit" class="btn btn-primary">Declinar </button>
							<div style="float:right;">
								<button type="button" id="btnresult" class="btn btn-rosa mx-1 formulario-enviar"></button>	
							</div>				
				</form>
			</div>			
		</div>			
	</div>	
</div>
@endfor
<div class="mt-5">
</div>
@endsection

@push('js-scripts')
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush