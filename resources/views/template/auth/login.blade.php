@extends('layout.simple')
@section('title',  "Inicio de Sesión")

@section('content')
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="{{route('landing')}}" class="mb-2">
						<img alt="Logo" src="{{asset('enti/logo.png')}}" class="h-40px" />
					</a>
					<a href="{{route('landing')}}" class="btn btn-lg btn-light-primary me-3 mb-12">
						<span class="svg-icon svg-icon-4 me-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
								<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
							</svg>
						</span>
						Volver
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100 axios-form" novalidate="novalidate" id="kt_sign_in_form" action="{{route('login.auth')}}">
							@csrf
							@method('POST')
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Inicia Sesión</h1>
								<div class="text-gray-400 fw-bold fs-4">Eres nuevo?
								<a href="{{route('register.page')}}" class="link-primary fw-bolder">Crea tu cuenta</a></div>
							</div>
							<x-input name="email" label="Email" placeholder="Ingresa tu email" type="email" class="form-control-lg" mb="mb-10"/>
							<x-input name="password" label="Contraseña" placeholder="Ingresa tu contraseña" type="password" class="form-control-lg" mb="mb-10"/>
							<div class="text-center">
								<x-formbtn color="rosa" text="Iniciar Sesión"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection

@push('js-scripts')
<script>
    let validateOptions = {
        fields: {
            "email": {
                validators: {
                    notEmpty: {
                        message: "{{__("input.invalid.empty")}}"
                    },
                    emailAddress: {
                        message: "{{__("input.invalid.email")}}"
                    }
                },
            },
            "password": {
                validators: {
                    notEmpty: {
                        message: "{{__("input.invalid.empty")}}"
                    },
                }
            },
        }
    }
</script>
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush