@extends('layout.profile')
@section('title',  "Mis datos")

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	@if (Auth::user()->first_reg == 0)
		<script>

			d = {    
				'id' : {{Auth::user()->id}},
				'first' : 1,
			}

			$.ajax({
				type:"POST",
				url: '{{route('edit-perfil')}}',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: d,    
				success: function (data) {
					console.log(data);
				},
				error: function (xhr) {
					console.log(xhr);
				}
			});

		</script>
	@endif

@section('content')
<div class="row mb-6 align-items-stretch">
	<div class="col-lg-6">
		<div class="card h-100 bgi-no-repeat bgi-size-cover" style="background:url('{{asset('assets/media/stock/600x400/img-20.jpg')}}')">
			<div class="card-body p-6">
				<span class="text-black fw-bolder fs-1">Bienvenido{{auth()->user()->roll}}</span><br />
				<span class="text-black text-hover-light fw-bolder fs-1">{{auth()->user()->nombre}}</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card h-100">
			<div class="card-body d-flex flex-column justify-content-between">
				<!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs046.svg-->
				<span class="svg-icon svg-icon-dark svg-icon-2hx ms-n1 flex-grow-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black"/>
				<path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black"/>
				</svg></span>
				<!--end::Svg Icon-->
				<div class="d-flex flex-column">
					<div class="text-dark fw-bolder fs-1 mb-0 mt-5">{{count(auth()->user()->conexionesAceptadas)}}</div>
					<div class="text-muted fw-bold fs-6">Conexiones realizadas</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card h-100">
			<div class="card-body d-flex flex-column justify-content-between">
				<i class="fas fa-thumbs-up fs-2x"></i>
				<div class="d-flex flex-column">
					<div class="text-dark fw-bolder fs-1 mb-0 mt-5">Activo desde</div>
					<div class="text-muted fw-bold fs-6">{{date('Y-m-d', strtotime(auth()->user()->created_at))}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Mis datos</h3>
			</div>
			<div class="card-footer">
				<form id="data" method="POST" action="{{route('user.information')}}" class="axios-form" accept-charset="utf-8">
					@csrf
					@method('PUT')
					<x-textarea name="descripcion" label="Descripción" placeholder="Ingresa una breve descripción de lo que realizas" :required="false" :value="auth()->user()->descripcion" />
					<x-inputgroup name="twitter" label="Twitter" placeholder="Enlace a tu cuenta de twitter" :required="false"  :value="auth()->user()->twitter">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-twitter fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="facebook" label="Facebook" placeholder="Enlace a tu cuenta de Facebook" :required="false" :value="auth()->user()->facebook">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-facebook fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="instagram" label="Instagram" placeholder="Enlace a tu cuenta de Instagram" :required="false" :value="auth()->user()->instagram">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-instagram fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="linkedin" label="LinkedIn" placeholder="Enlace a tu cuenta de LinkedIn" :required="false" :value="auth()->user()->linkedin">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-linkedin fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="youtube" label="Youtube" placeholder="Enlace a tu cuenta de Youtube" :required="false" :value="auth()->user()->youtube">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-youtube fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="tiktok" label="TikTok" placeholder="Enlace a tu cuenta de TikTok" :required="false" :value="auth()->user()->tiktok">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fab fa-tiktok fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					<x-inputgroup name="web" label="Sitio web" placeholder="Enlace a tu sitio web" :required="false" :value="auth()->user()->web">
						<x-slot name="before">
							<span class="input-group-text">
						        <i class="fas fa-globe fs-4"></i>
						    </span>
						</x-slot>
					</x-inputgroup>
					@if(auth()->user()->perfil == 'startup' || auth()->user()->perfil == 'firma')
					<x-select name="industria_id" label="Industria/Sector" placeholder="Selecciona la industria/sector">
						<x-slot name="values">
							@foreach($industrias??[] as $v => $d)
							<option @if(auth()->user()->industria_id == $v) selected @endif value="{{$v}}">{{$d}}</option>
							@endforeach
						</x-slot>
					</x-select>
					@endif
					@if(auth()->user()->perfil == 'startup' || auth()->user()->perfil == 'firma')
					<x-select name="estado" label="Estado del emprendimiento" placeholder="Selecciona el estado">
						<x-slot name="values">
							<option @if(auth()->user()->estado == 'marcha') selected @endif value="marcha">Negocio en marcha</option>
							<option @if(auth()->user()->estado == 'idea') selected @endif value="idea">Idea de Negocio</option>
						</x-slot>
					</x-select>
					@endif
					@if(auth()->user()->perfil == 'startup')
					<x-select name="ventas" label="Ventas Anuales" placeholder="Seleccione la cantidad de ventas anuales">
						<x-slot name="values">
							<option value="">Seleccione la cantidad de ventas anuales</option>
							<option @if(auth()->user()->ventas == "5") selected @endif value="5">{{__('categorias.ventas.5')}}</option>
							<option @if(auth()->user()->ventas == "10") selected @endif value="10">{{__('categorias.ventas.10')}}</option>
							<option @if(auth()->user()->ventas == "20") selected @endif value="20">{{__('categorias.ventas.20')}}</option>
							<option @if(auth()->user()->ventas == "50") selected @endif value="50">{{__('categorias.ventas.50')}}</option>
							<option @if(auth()->user()->ventas == "100") selected @endif value="100">{{__('categorias.ventas.100')}}</option>
							<option @if(auth()->user()->ventas == "max") selected @endif value="max">{{__('categorias.ventas.max')}}</option>
						</x-slot>
					</x-select>
					<x-select name="capital_institucional" label="¿Has recibido Capital Institucional? Ejemplo: Capital de ángeles inversionistas o firmas de capital privado" placeholder="Seleccione si ha recibido capital Institucional">
						<x-slot name="values">
							<option value="">Seleccione si ha recibido capital Institucional</option>
							<option @if(auth()->user()->capital_institucional == "si") selected @endif value="si">Si</option>
							<option @if(auth()->user()->capital_institucional == "no") selected @endif value="no">No</option>
						</x-slot>
					</x-select>
					<x-select name="prestamo_financiero" label="¿Has recibidos préstamos del sistema financiero?" placeholder="Seleccione si ha recibido prestamos del sistema financiero">
						<x-slot name="values">
							<option value="">Seleccione si ha recibido prestamos del sistema financiero</option>
							<option @if(auth()->user()->prestamo_financiero == "si") selected @endif value="si">Si</option>
							<option @if(auth()->user()->prestamo_financiero == "no") selected @endif value="no">No</option>
						</x-slot>
					</x-select>
					<x-select name="equipo" label="Tamaño de tu equipo" placeholder="Seleccione el tamaño de su equipo">
						<x-slot name="values">
							<option value="">Seleccione el tamaño de su equipo</option>
							<option @if(auth()->user()->equipo == "1") selected @endif value="1">{{__('categorias.equipo.1')}}</option>
							<option @if(auth()->user()->equipo == "5") selected @endif value="5">{{__('categorias.equipo.5')}}</option>
							<option @if(auth()->user()->equipo == "10") selected @endif value="10">{{__('categorias.equipo.10')}}</option>
							<option @if(auth()->user()->equipo == "50") selected @endif value="50">{{__('categorias.equipo.50')}}</option>
							<option @if(auth()->user()->equipo == "mas") selected @endif value="mas">{{__('categorias.equipo.mas')}}</option>
						</x-slot>
					</x-select>
					@elseif (auth()->user()->perfil == 'firma')
					<div class="row px-3">
						<h5>Tipo de Capital (puedes seleccionar mas de una opción)</h5>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->tipo_capital & 1) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->tipo_capital & 2) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->tipo_capital & 4) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->tipo_capital & 8) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->tipo_capital & 16) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.16')}}
						    </span>
						</label>
					</div>
					@elseif (auth()->user()->perfil == 'expertos')
					<div class="row px-3">
						<h5>Tipo de Experticia (puedes seleccionar mas de una opción)</h5>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 1) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.experticia.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 2) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 4) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.4')}}

						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 8) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
						        {{__('categorias.experticia.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 16) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.16')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 32) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="32"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.32')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->experticia & 64) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="64"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.64')}}
						    </span>
						</label>
					</div>
					<x-select name="experiencia" label="Años de experiencia" placeholder="Seleccione sus Años de experiencia">
						<x-slot name="values">
							<option value="">Seleccione sus Años de experiencia</option>
							<option @if(auth()->user()->experiencia == "1") selected @endif value="1">{{__('categorias.experiencia.1')}}</option>
							<option @if(auth()->user()->experiencia == "5") selected @endif value="5">{{__('categorias.experiencia.5')}}</option>
							<option @if(auth()->user()->experiencia == "10") selected @endif value="10">{{__('categorias.experiencia.10')}}</option>
							<option @if(auth()->user()->experiencia == "mas") selected @endif value="mas">{{__('categorias.experiencia.mas')}}</option>
						</x-slot>
					</x-select>
					<x-select name="fundador" label="¿Ha sido fundador de alguna compañia?" placeholder="Seleccione si ha sido fundador de una compañia">
						<x-slot name="values">
							<option value="">Seleccione si ha sido fundador de una compañia</option>
							<option @if(auth()->user()->fundador == "si") selected @endif value="si">Si</option>
							<option @if(auth()->user()->fundador == "no") selected @endif value="no">No</option>
						</x-slot>
					</x-select>					
						<x-input  name="precio" label="Valor de la oferta" placeholder="Ingresa valor de la oferta" :required="false" :value="auth()->user()->precio"/>
					@elseif (auth()->user()->perfil == 'mentores')
					<x-select name="experiencia" label="Años de experiencia" placeholder="Seleccione sus Años de experiencia">
						<x-slot name="values">
							<option value="">Seleccione sus Años de experiencia</option>
							<option @if(auth()->user()->experiencia == "1") selected @endif value="1">{{__('categorias.experiencia.1')}}</option>
							<option @if(auth()->user()->experiencia == "5") selected @endif value="5">{{__('categorias.experiencia.5')}}</option>
							<option @if(auth()->user()->experiencia == "10") selected @endif value="10">{{__('categorias.experiencia.10')}}</option>
							<option @if(auth()->user()->experiencia == "mas") selected @endif value="mas">{{__('categorias.experiencia.mas')}}</option>
						</x-slot>
					</x-select>
					<x-select name="fundador" label="¿Ha sido fundador de alguna compañia?" placeholder="Seleccione si ha sido fundador de una compañia">
						<x-slot name="values">
							<option value="">Seleccione si ha sido fundador de una compañia</option>
							<option @if(auth()->user()->fundador == "si") selected @endif value="si">Si</option>
							<option @if(auth()->user()->fundador == "no") selected @endif value="no">No</option>
						</x-slot>
					</x-select>					
						<x-input  name="precio" label="Valor de la oferta" placeholder="Ingresa valor de la oferta" :required="false" :value="auth()->user()->precio"/>
							@elseif (auth()->user()->perfil == 'inversionista')
					<div class="row px-3">
						<h5>Tipo de Formación (puedes seleccionar mas de una opción)</h5>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->formacion & 1) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->formacion & 2) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->formacion & 4) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->formacion & 8) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->formacion & 16) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.16')}}
						    </span>
						</label>
					</div>
					@elseif (auth()->user()->perfil == 'influencer')
					<x-input type="number" name="engagement" label="Ratio de Engagement" placeholder="Ingresa el ratio de engagement" :required="false" :value="auth()->user()->engagement"/>
					<x-select name="seguidores" label="Número de seguidores" placeholder="Seleccione su número de seguidores">
						<x-slot name="values">
							<option value="">Seleccione su número de seguidores</option>
							<option @if(auth()->user()->seguidores == "20") selected @endif value="20">{{__('categorias.seguidores.20')}}</option>
							<option @if(auth()->user()->seguidores == "50") selected @endif value="50">{{__('categorias.seguidores.50')}}</option>
							<option @if(auth()->user()->seguidores == "100") selected @endif value="100">{{__('categorias.seguidores.100')}}</option>
							<option @if(auth()->user()->seguidores == "250") selected @endif value="250">{{__('categorias.seguidores.250')}}</option>
							<option @if(auth()->user()->seguidores == "mas") selected @endif value="mas">{{__('categorias.seguidores.mas')}}</option>
						</x-slot>
					</x-select>
					<div class="row px-3">	
					<h5>Tipo de plataforma (puedes seleccionar mas de una opción)</h5>
					     	<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->social_platform & 1) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.1')}}
						    </span>
						</label>
						
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->social_platform & 2) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						       	{{__('categorias.sociales.2')}}
						    </span>
						</label>
						
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->social_platform & 4) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						       	{{__('categorias.sociales.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->social_platform & 16) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						       	{{__('categorias.sociales.16')}}
						    </span>
						</label>
						
							<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if(auth()->user()->social_platform & 32) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="32"/>
						    <span class="form-check-label">
						       	{{__('categorias.sociales.32')}}
						    </span>
						</label>
		            	</div>
					@endif
					<x-formbtn text="Guardar datos"/>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js-scripts')
<script>
	let common = {
		validators: {
			stringLength: {
				min: 4,
				max: 255,
				message: "El campo debe contener entre 4 y 255 carácteres"
			}
		}
	}

	let validateOptions = {
		fields: {
			"descripcion": {
				validators: {
					stringLength: {
						max: 1000,
						message: "El campo debe contener máximo 1000 carácteres"
					}
				}
			},
			"twitter": common,
			"tiktok": common,
			"facebook": common,
			"instagram": common,
			"youtube": common,
			"linkedin": common,
			"web": common,
		}
	}
</script>
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush