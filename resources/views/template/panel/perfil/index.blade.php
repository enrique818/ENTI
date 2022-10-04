@extends('layout.profile')
@if($user->id == auth()->user()->id)
@section('title',  "Configurar cuenta")
@else
@section('title',  "Perfil de ".$user->nombre)
@endif

@section('content')

@if (Auth::user()->roll == '4dm1n3t')

	<script>
		window.location.href = '{{ route('admin-index') }}';
	</script>

@else

	@if (Auth::user()->first_reg == 0)


		<script>

			Swal.fire({
			title: 'Hola!! Bienvenido a la familia Enti. Te invitamos a completar tu perfil para tener mayor visibilidad en nuestra plataforma.',
			icon: 'info',
			confirmButtonText: 'Completar perfil',
			showCloseButton: true
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = '{{ route('edit-perfil') }}';
				}
			})



/*             swalWithBootstrapButtons.fire({

				title: 'DESEAS ELIMINAR TU CUENTA?',
				text: "¡No podrás revertir esto!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Aceptar',
				cancelButtonText: 'Cancelar',
				reverseButtons: true

				}).then((result) => {

				if (result.isConfirmed) {
					window.location.href = '{{ route('edit-perfil') }}';
				}
			}) */


		</script>
	@endif

@endif

<div class="row">
	<div class="col-12">
		<div class="card h-100 mb-6">
			<div class="card-body pt-9 pb-0">
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="{{asset($user->img)}}" alt="image" />
							<div class="d-flex my-1">
								<a href="{{route('edit-perfil', ['user' => $user->id])}}"  class="btn btn-sm btn-light-danger" style="width: 100%">Editar Perfil</a>
							</div>
													<!-- <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div> -->
						</div>
					</div>
					<div class="flex-grow-1">
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<div class="d-flex flex-column">
								<div class="d-flex align-items-center mb-2">
									<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$user->nombre}}</a>
								<span class="badge badge-primary ms-4">
									{{$user->pais}}
								</span>
								<span class="badge badge-light ms-4">
									{{$user->rol}}
								</span>
								</div>
					
								<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
									<span class="d-flex align-items-center text-dark mb-2 me-2">
										<span class="svg-icon svg-icon-4 me-1 svg-icon-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"/>
										<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"/>
										</svg></span>Desde {{date('Y-m-d', strtotime($user->created_at))}}
									</span>
									@if($user->tieneIndustria)
									<span class="d-flex align-items-center text-dark mb-2">
									<i class="fas fa-building svg-icon svg-icon-4 me-1 svg-icon-gray-600"></i>{{$user->industria->nombre??''}}</span>
									@endif
								</div>
							</div>
							<div class="d-flex my-1">
								@if($user->id != auth()->user()->id)
									@if ($user->tieneConexionPendiente())
										@if (auth()->user()->envioConexion($user))
										<button class="btn btn-sm btn-success me-3" id="conexionBtn" disabled>Solicitud de conexión enviada</button>
										@else
										<form action="{{route('connection.decline', ['connection' => $user->conexionPendiente->id])}}" method="post" accept-charset="utf-8" class="axios-form-confirm">
											@csrf
											<button type="submit" class="btn btn-sm btn-danger me-3" id="rechazarbtn">Rechazar Conexión</button>
										</form>
										<form action="{{route('connection.accept', ['connection' => $user->conexionPendiente->id])}}" method="post" accept-charset="utf-8" class="axios-form-confirm">
											@csrf
											<button type="submit" class="btn btn-sm btn-success me-3" id="aceptarBtn">Aceptar Conexión</button>
										</form>
										@endif
									@else
										@if ($user->tieneConexionAceptada($user))
										<button class="btn btn-sm btn-success me-3" id="conexionBtn" disabled>Conectado</button>
										@else
										<form action="{{route('user.connection.send', ['user' => $user->id])}}" method="post" accept-charset="utf-8" class="axios-form-confirm">
											@csrf
											<button type="submit" class="btn btn-sm btn-success me-3" id="conexionBtn">Enviar solicitud de conexión</button>
										</form>
										@endif
									@endif
								<a href="{{route('user.chat', ['user' => $user->id])}}" class="btn btn-sm btn-light me-3">Abrir chat</a>
								@endif
							</div>
						</div>
						<div class="d-flex flex-wrap flex-stack">
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<div class="d-flex flex-wrap">
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<div class="d-flex align-items-center">
											<span class="svg-icon svg-icon-3 svg-icon-success me-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black"/>
											<path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black"/>
											</svg></span>
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$user->conexionesReales}}" data-kt-countup-prefix="">0</div>
										</div>
										<div class="fw-bold fs-6 text-gray-400">Conexiones</div>
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<div class="d-flex align-items-center">
											<span class="svg-icon svg-icon-3 svg-icon-success me-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
												<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
												</svg>
											</span>
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="0" data-kt-countup-prefix="">0</div>
										</div>
										<div class="fw-bold fs-6 text-gray-400">Cursos completados</div>
									</div>
									@if($user->perfil == 'startup')
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<div class="fw-bold fs-6 text-gray-600">Estado de emprendimiento</div>
										<div class="fw-bold fs-6 text-gray-400">{{$user->estado}}</div>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				@if($user->descripcion != '')
				<div class="mt-4">
					<h3 class="text-muted">Acerca de mi</h3>
					<p class="fw-bolder">{{$user->descripcion}}</p>
				</div>
				@endif
				@if($user->perfil == 'startup')
					@if($user->ventas != '')
					<div class="mt-4">
						<h3 class="text-muted">Ventas anuales</h3>
						<p class="fw-bolder">{{$user->ventasAnuales}}</p>
					</div>
					@endif
					@if($user->capital_institucional != '')
					<div class="mt-4">
						<h3 class="text-muted">El usuario ha recibido Capital Institucional</h3>
						<p class="fw-bolder">{{$user->capital_institucional}}</p>
					</div>
					@endif
					@if($user->prestamo_financiero != '')
					<div class="mt-4">
						<h3 class="text-muted">El usuario ha recibido Prestamos del sistema financiero</h3>
						<p class="fw-bolder">{{$user->prestamo_financiero}}</p>
					</div>
					@endif
					@if($user->equipo != '')
					<div class="mt-4">
						<h3 class="text-muted">Tamaño del equipo</h3>
						<p class="fw-bolder">{{$user->equipo}}</p>
					</div>
					@endif
				@endif
				@if($user->perfil == 'firma')
					<div class="row px-3">
						<h5>Tipo de Capital</h5>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->tipo_capital & 1) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->tipo_capital & 2) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->tipo_capital & 4) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->tipo_capital & 8) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->tipo_capital & 16) checked @endif name="tipo_capital[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.tipo_capital.16')}}
						    </span>
						</label>
					</div>
				@endif
				@if($user->perfil == 'expertos')
				@if($user->experiencia != '')
					<div class="mt-4">
						<h3 class="text-muted">Años de experiencia</h3>
						<p class="fw-bolder">{{$user->experiencia}}</p>
					</div>
					@endif
					@if($user->fundador != '')
					<div class="mt-4">
						<h3 class="text-muted">El usuario ha sido Fundador de Compañia</h3>
						<p class="fw-bolder">{{$user->fundador}}</p>
					</div>
					@endif
					@if($user->precio != '')
					<div class="mt-4">
						<h3 class="text-muted">El valor ofertado es:</h3>
						<p class="fw-bolder">{{$user->precio}}</p>
					</div>
					@endif
					<div class="row px-3">
						<h3 class="text-muted">Tipo de experticia</h3>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 1) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.experticia.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 2) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.experticia.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 4) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 8) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 16) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.experticia.16')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 32) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="32"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.32')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->experticia & 64) checked @endif name="experticia[]" class="form-check-input" type="checkbox" value="64"/>
						    <span class="form-check-label">
								{{__('categorias.experticia.64')}}
						    </span>
						</label>
					</div>
				@endif
				@if($user->perfil == 'mentores')
					@if($user->experiencia != '')
					<div class="mt-4">
						<h3 class="text-muted">Años de experiencia</h3>
						<p class="fw-bolder">{{$user->experiencia}}</p>
					</div>
					@endif
					@if($user->fundador != '')
					<div class="mt-4">
						<h3 class="text-muted">El usuario ha sido Fundador de Compañia</h3>
						<p class="fw-bolder">{{$user->fundador}}</p>
					</div>
					@endif
					@if($user->precio != '')
					<div class="mt-4">
						<h3 class="text-muted">El valor ofertado es:</h3>
						<p class="fw-bolder">{{$user->precio}}</p>
			       </div>
					@endif
				@endif
				@if($user->perfil == 'inversionista')
					<div class="row px-3">
						<h5>Tipo de Formación</h5>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->formacion & 1) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->formacion & 2) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->formacion & 4) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->formacion & 8) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="8"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.8')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input @if($user->formacion & 16) checked @endif name="formacion[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.formacion.16')}}
						    </span>
						</label>
					</div>
				@endif
				@if($user->perfil == 'influencer')
					@if($user->engagement != '')
					<div class="row px-3">
						<h3 class="text-muted">Tipo de plataforma</h3>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->social_platform & 1) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="1"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.1')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->social_platform & 2) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="2"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.2')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->social_platform & 4) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="4"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.4')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->social_platform & 16) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="16"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.16')}}
						    </span>
						</label>
						<label class="form-check form-check-custom form-check-solid  form-check-sm mb-2">
						    <input disabled @if($user->social_platform & 32) checked @endif name="social_platform[]" class="form-check-input" type="checkbox" value="32"/>
						    <span class="form-check-label">
						        {{__('categorias.sociales.32')}}
						    </span>
						</label>
					</div>
					<div class="mt-4">
						<h3 class="text-muted">Ratio de engagement</h3>
						<p class="fw-bolder">{{$user->engagement}}</p>
					</div>
					@endif
					@if($user->seguidores != '')
					<div class="mt-4">
						<h3 class="text-muted">Número de seguidores</h3>
						<p class="fw-bolder">{{$user->seguidores}}</p>
					</div>
					@endif
				@endif

				@if($user->tieneSocial)
				<div class="mt-4 d-flex justify-content-end">
					@if($user->twitter != '')
					<a href="{{$user->twitter}}" class="btn btn-lg btn-icon twitter-btn ms-3"><i class="fab fa-twitter fs-1"></i></a>
					@endif
					@if($user->facebook != '')
					<a href="{{$user->facebook}}" class="btn btn-lg btn-icon facebook-btn ms-3"><i class="fab fa-facebook fs-1"></i></a>
					@endif
					@if($user->instagram != '')
					<a href="{{$user->instagram}}" class="btn btn-lg btn-icon instagram-btn ms-3"><i class="fab fa-instagram fs-1"></i></a>
					@endif
					@if($user->linkedin != '')
					<a href="{{$user->linkedin}}" class="btn btn-lg btn-icon linkedin-btn ms-3"><i class="fab fa-linkedin fs-1"></i></a>
					@endif
					@if($user->youtube != '')
					<a href="{{$user->youtube}}" class="btn btn-lg btn-icon youtube-btn ms-3"><i class="fab fa-youtube fs-1"></i></a>
					@endif
					@if($user->tiktok != '')
					<a href="{{$user->tiktok}}" class="btn btn-lg btn-icon tiktok-btn ms-3"><i class="fab fa-tiktok fs-1"></i></a>
					@endif
					@if($user->web != '')
					<a href="{{$user->web}}" class="btn btn-lg btn-icon btn-active-dark btn-outline btn-outline-dark ms-3 text-dark"><i class="fas fa-globe fs-1"></i></a>
					@endif
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
