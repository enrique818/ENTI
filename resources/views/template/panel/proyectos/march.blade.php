@extends('layout.profile')
@section('title',  "Proyectos en marcha")

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Startup por la cual fue contratado</h3>
				<div class="d-flex justify-content-center flex-column me-3">
					<a href="{{route('user.show', ['user' => $user->id])}}" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$user->nombre}}</a>
				</div>				
		</div>
			<div class="card-header">
				<h3 class="card-title">Proyectos en marcha</h3>
				
			</div>		
			<div class="card-footer">
				<form id="data" method="POST" action="{{route('user.information')}}" class="axios-form" accept-charset="utf-8">
					@csrf
					@method('PUT')					
					<x-input  name="startup" label="Nombre de la startup con la cual trabaja" placeholder="Ingrese el nombre de la Startup con la cual trabaja" :required="false" value="{{Auth::user()->nombre}}"/>
                    <x-input  name="precio" label="Precio de la oferta" placeholder="Ingrese el precio de la oferta" :required="false" :value="auth()->user()->precio"/>
                    <x-textarea name="contenido" label="Contenido del proyecto" placeholder="Describa el contenido del proyecto" :required="false" :value="auth()->user()->descripcion"/>
                    <x-textarea name="avance" label="Avances del proyecto" placeholder="Describa los avances del proyecto" :required="false" :value="auth()->user()->contacto"/>
					<x-formbtn text="Guardar datos"/>
				</form>
			</div>			
		</div>
		<div class="mt-5">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Proyectos en marcha</h3>
			</div>		
			<div class="card-footer">
				<form id="data" method="POST" action="{{route('user.information')}}" class="axios-form" accept-charset="utf-8">
					@csrf
					@method('PUT')					
					<x-input  name="startup" label="Nombre de la startup con la cual trabaja" placeholder="Ingrese el nombre de la Startup con la cual trabaja" :required="false" value="{{Auth::user()->nombre}}"/>
                    <x-input  name="precio" label="Precio de la oferta" placeholder="Ingrese el precio de la oferta" :required="false" :value="auth()->user()->precio"/>
                    <x-textarea name="contenido" label="Contenido del proyecto" placeholder="Describa el contenido del proyecto" :required="false" :value="auth()->user()->contenido"/>
                    <x-textarea name="avance" label="Avances del proyecto" placeholder="Describa los avances del proyecto" :required="false" :value="auth()->user()->avance"/>
					<x-formbtn text="Guardar datos"/>
				</form>
			</div>			
		</div>
	</div>
</div>
</div>
@endsection

@push('js-scripts')
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush