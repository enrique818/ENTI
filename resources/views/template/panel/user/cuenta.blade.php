@extends('layout.profile')
@if($user->id == auth()->user()->id)
@section('title',  "Mi perfil")
@else
@section('title',  "Perfil de ".$user->nombre)
@endif

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card h-100 mb-6">
			<div class="card-body pt-9 pb-0">
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="{{asset($user->img)}}" alt="image" />
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
				@if($user->perfil == 'mentores' || $user->perfil == 'expertos')
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
	@can('update', $user)
	<div class="col-12 mt-4">
		<div class="card h-100 mb-6">
			<div class="card-header">
				<h3 class="card-title">Configuración</h3>
			</div>
			<div class="card-body">
				<form  validate-option="0" class="axios-form" method="POST" action="{{route('user.update', ['user' => $user->id])}}" class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
									<div class="w-100">
										<div class="">
											<h2 class="fw-bolder text-dark">Datos Personales</h2>
										</div>
										@csrf
										<x-input name="nombre" label="Nombre Completo" placeholder="Ingresa el nombre" value="{{$user->nombre}}" />
										<x-input name="email" label="Email" placeholder="Ingresa tu email" type="email" value="{{$user->email}}"/>
										<x-select name="pais" label="País" placeholder="Ingresa tu país">
											<x-slot name="values">
												<option value="Afganistán" id="AF">Afganistán</option>
												<option value="Albania" id="AL">Albania</option>
												<option value="Alemania" id="DE">Alemania</option>
												<option value="Andorra" id="AD">Andorra</option>
												<option value="Angola" id="AO">Angola</option>
												<option value="Anguila" id="AI">Anguila</option>
												<option value="Antártida" id="AQ">Antártida</option>
												<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
												<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
												<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
												<option value="Argelia" id="DZ">Argelia</option>
												<option value="Argentina" id="AR">Argentina</option>
												<option value="Armenia" id="AM">Armenia</option>
												<option value="Aruba" id="AW">Aruba</option>
												<option value="Australia" id="AU">Australia</option>
												<option value="Austria" id="AT">Austria</option>
												<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
												<option value="Bahamas" id="BS">Bahamas</option>
												<option value="Bahrein" id="BH">Bahrein</option>
												<option value="Bangladesh" id="BD">Bangladesh</option>
												<option value="Barbados" id="BB">Barbados</option>
												<option value="Bélgica" id="BE">Bélgica</option>
												<option value="Belice" id="BZ">Belice</option>
												<option value="Benín" id="BJ">Benín</option>
												<option value="Bermudas" id="BM">Bermudas</option>
												<option value="Bhután" id="BT">Bhután</option>
												<option value="Bielorrusia" id="BY">Bielorrusia</option>
												<option value="Birmania" id="MM">Birmania</option>
												<option value="Bolivia" id="BO">Bolivia</option>
												<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
												<option value="Botsuana" id="BW">Botsuana</option>
												<option value="Brasil" id="BR">Brasil</option>
												<option value="Brunei" id="BN">Brunei</option>
												<option value="Bulgaria" id="BG">Bulgaria</option>
												<option value="Burkina Faso" id="BF">Burkina Faso</option>
												<option value="Burundi" id="BI">Burundi</option>
												<option value="Cabo Verde" id="CV">Cabo Verde</option>
												<option value="Camboya" id="KH">Camboya</option>
												<option value="Camerún" id="CM">Camerún</option>
												<option value="Canadá" id="CA">Canadá</option>
												<option value="Chad" id="TD">Chad</option>
												<option value="Chile" id="CL">Chile</option>
												<option value="China" id="CN">China</option>
												<option value="Chipre" id="CY">Chipre</option>
												<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
												<option value="Colombia" id="CO">Colombia</option>
												<option value="Comores" id="KM">Comores</option>
												<option value="Congo" id="CG">Congo</option>
												<option value="Corea" id="KR">Corea</option>
												<option value="Corea del Norte" id="KP">Corea del Norte</option>
												<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
												<option value="Costa Rica" id="CR">Costa Rica</option>
												<option value="Croacia" id="HR">Croacia</option>
												<option value="Cuba" id="CU">Cuba</option>
												<option value="Dinamarca" id="DK">Dinamarca</option>
												<option value="Djibouri" id="DJ">Djibouri</option>
												<option value="Dominica" id="DM">Dominica</option>
												<option value="Ecuador" id="EC">Ecuador</option>
												<option value="Egipto" id="EG">Egipto</option>
												<option value="El Salvador" id="SV">El Salvador</option>
												<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
												<option value="Eritrea" id="ER">Eritrea</option>
												<option value="Eslovaquia" id="SK">Eslovaquia</option>
												<option value="Eslovenia" id="SI">Eslovenia</option>
												<option value="España" id="ES">España</option>
												<option value="Estados Unidos" id="US">Estados Unidos</option>
												<option value="Estonia" id="EE">Estonia</option>
												<option value="c" id="ET">Etiopía</option>
												<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
												<option value="Filipinas" id="PH">Filipinas</option>
												<option value="Finlandia" id="FI">Finlandia</option>
												<option value="Francia" id="FR">Francia</option>
												<option value="Gabón" id="GA">Gabón</option>
												<option value="Gambia" id="GM">Gambia</option>
												<option value="Georgia" id="GE">Georgia</option>
												<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
												<option value="Ghana" id="GH">Ghana</option>
												<option value="Gibraltar" id="GI">Gibraltar</option>
												<option value="Granada" id="GD">Granada</option>
												<option value="Grecia" id="GR">Grecia</option>
												<option value="Groenlandia" id="GL">Groenlandia</option>
												<option value="Guadalupe" id="GP">Guadalupe</option>
												<option value="Guam" id="GU">Guam</option>
												<option value="Guatemala" id="GT">Guatemala</option>
												<option value="Guayana" id="GY">Guayana</option>
												<option value="Guayana francesa" id="GF">Guayana francesa</option>
												<option value="Guinea" id="GN">Guinea</option>
												<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
												<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
												<option value="Haití" id="HT">Haití</option>
												<option value="Holanda" id="NL">Holanda</option>
												<option value="Honduras" id="HN">Honduras</option>
												<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
												<option value="Hungría" id="HU">Hungría</option>
												<option value="India" id="IN">India</option>
												<option value="Indonesia" id="ID">Indonesia</option>
												<option value="Irak" id="IQ">Irak</option>
												<option value="Irán" id="IR">Irán</option>
												<option value="Irlanda" id="IE">Irlanda</option>
												<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
												<option value="Isla Christmas" id="CX">Isla Christmas</option>
												<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
												<option value="Islandia" id="IS">Islandia</option>
												<option value="Islas Caimán" id="KY">Islas Caimán</option>
												<option value="Islas Cook" id="CK">Islas Cook</option>
												<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
												<option value="Islas Faroe" id="FO">Islas Faroe</option>
												<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
												<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
												<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
												<option value="Islas Marshall" id="MH">Islas Marshall</option>
												<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
												<option value="Islas Palau" id="PW">Islas Palau</option>
												<option value="Islas Salomón" d="SB">Islas Salomón</option>
												<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
												<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
												<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
												<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
												<option value="Israel" id="IL">Israel</option>
												<option value="Italia" id="IT">Italia</option>
												<option value="Jamaica" id="JM">Jamaica</option>
												<option value="Japón" id="JP">Japón</option>
												<option value="Jordania" id="JO">Jordania</option>
												<option value="Kazajistán" id="KZ">Kazajistán</option>
												<option value="Kenia" id="KE">Kenia</option>
												<option value="Kirguizistán" id="KG">Kirguizistán</option>
												<option value="Kiribati" id="KI">Kiribati</option>
												<option value="Kuwait" id="KW">Kuwait</option>
												<option value="Laos" id="LA">Laos</option>
												<option value="Lesoto" id="LS">Lesoto</option>
												<option value="Letonia" id="LV">Letonia</option>
												<option value="Líbano" id="LB">Líbano</option>
												<option value="Liberia" id="LR">Liberia</option>
												<option value="Libia" id="LY">Libia</option>
												<option value="Liechtenstein" id="LI">Liechtenstein</option>
												<option value="Lituania" id="LT">Lituania</option>
												<option value="Luxemburgo" id="LU">Luxemburgo</option>
												<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
												<option value="Madagascar" id="MG">Madagascar</option>
												<option value="Malasia" id="MY">Malasia</option>
												<option value="Malawi" id="MW">Malawi</option>
												<option value="Maldivas" id="MV">Maldivas</option>
												<option value="Malí" id="ML">Malí</option>
												<option value="Malta" id="MT">Malta</option>
												<option value="Marruecos" id="MA">Marruecos</option>
												<option value="Martinica" id="MQ">Martinica</option>
												<option value="Mauricio" id="MU">Mauricio</option>
												<option value="Mauritania" id="MR">Mauritania</option>
												<option value="Mayotte" id="YT">Mayotte</option>
												<option value="México" id="MX">México</option>
												<option value="Micronesia" id="FM">Micronesia</option>
												<option value="Moldavia" id="MD">Moldavia</option>
												<option value="Mónaco" id="MC">Mónaco</option>
												<option value="Mongolia" id="MN">Mongolia</option>
												<option value="Montserrat" id="MS">Montserrat</option>
												<option value="Mozambique" id="MZ">Mozambique</option>
												<option value="Namibia" id="NA">Namibia</option>
												<option value="Nauru" id="NR">Nauru</option>
												<option value="Nepal" id="NP">Nepal</option>
												<option value="Nicaragua" id="NI">Nicaragua</option>
												<option value="Níger" id="NE">Níger</option>
												<option value="Nigeria" id="NG">Nigeria</option>
												<option value="Niue" id="NU">Niue</option>
												<option value="Norfolk" id="NF">Norfolk</option>
												<option value="Noruega" id="NO">Noruega</option>
												<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
												<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
												<option value="Omán" id="OM">Omán</option>
												<option value="Panamá" id="PA">Panamá</option>
												<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
												<option value="Paquistán" id="PK">Paquistán</option>
												<option value="Paraguay" id="PY">Paraguay</option>
												<option value="Perú" id="PE">Perú</option>
												<option value="Pitcairn" id="PN">Pitcairn</option>
												<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
												<option value="Polonia" id="PL">Polonia</option>
												<option value="Portugal" id="PT">Portugal</option>
												<option value="Puerto Rico" id="PR">Puerto Rico</option>
												<option value="Qatar" id="QA">Qatar</option>
												<option value="Reino Unido" id="UK">Reino Unido</option>
												<option value="República Centroafricana" id="CF">República Centroafricana</option>
												<option value="República Checa" id="CZ">República Checa</option>
												<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
												<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
												<option value="República Dominicana" id="DO">República Dominicana</option>
												<option value="Reunión" id="RE">Reunión</option>
												<option value="Ruanda" id="RW">Ruanda</option>
												<option value="Rumania" id="RO">Rumania</option>
												<option value="Rusia" id="RU">Rusia</option>
												<option value="Samoa" id="WS">Samoa</option>
												<option value="Samoa occidental" id="AS">Samoa occidental</option>
												<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
												<option value="San Marino" id="SM">San Marino</option>
												<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
												<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
												<option value="Santa Helena" id="SH">Santa Helena</option>
												<option value="Santa Lucía" id="LC">Santa Lucía</option>
												<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
												<option value="Senegal" id="SN">Senegal</option>
												<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
												<option value="Sychelles" id="SC">Seychelles</option>
												<option value="Sierra Leona" id="SL">Sierra Leona</option>
												<option value="Singapur" id="SG">Singapur</option>
												<option value="Siria" id="SY">Siria</option>
												<option value="Somalia" id="SO">Somalia</option>
												<option value="Sri Lanka" id="LK">Sri Lanka</option>
												<option value="Suazilandia" id="SZ">Suazilandia</option>
												<option value="Sudán" id="SD">Sudán</option>
												<option value="Suecia" id="SE">Suecia</option>
												<option value="Suiza" id="CH">Suiza</option>
												<option value="Surinam" id="SR">Surinam</option>
												<option value="Svalbard" id="SJ">Svalbard</option>
												<option value="Tailandia" id="TH">Tailandia</option>
												<option value="Taiwán" id="TW">Taiwán</option>
												<option value="Tanzania" id="TZ">Tanzania</option>
												<option value="Tayikistán" id="TJ">Tayikistán</option>
												<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
												<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
												<option value="Timor Oriental" id="TP">Timor Oriental</option>
												<option value="Togo" id="TG">Togo</option>
												<option value="Tonga" id="TO">Tonga</option>
												<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
												<option value="Túnez" id="TN">Túnez</option>
												<option value="Turkmenistán" id="TM">Turkmenistán</option>
												<option value="Turquía" id="TR">Turquía</option>
												<option value="Tuvalu" id="TV">Tuvalu</option>
												<option value="Ucrania" id="UA">Ucrania</option>
												<option value="Uganda" id="UG">Uganda</option>
												<option value="Uruguay" id="UY">Uruguay</option>
												<option value="Uzbekistán" id="UZ">Uzbekistán</option>
												<option value="Vanuatu" id="VU">Vanuatu</option>
												<option value="Venezuela" id="VE">Venezuela</option>
												<option value="Vietnam" id="VN">Vietnam</option>
												<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
												<option value="Yemen" id="YE">Yemen</option>
												<option value="Zambia" id="ZM">Zambia</option>
												<option value="Zimbabue" id="ZW">Zimbabue</option>
											</x-slotvalues>
										</x-select>
									</div>
									<div class="w-100 mt-2">
										<div class="">
											<h2 class="fw-bolder text-dark">Logo</h2>
										</div>
										<div class="fv-row">
											<div class="row align-items-stretch">
												<div class="col-sm-3 mb-10">
													<input type="radio" class="btn-check" name="logo" value="personalizado" @if($user->avatar != 'assets/media/avatars/avatar-2.jpg' && $user->avatar != 'assets/media/avatars/avatar-1.jpg' && $user->avatar != 'assets/media/avatars/blank.png') checked="checked" @endif id="personalizado" />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center flex-column justify-content-center" for="personalizado">
														<img @if($user->avatar != 'assets/media/avatars/avatar-2.jpg' && $user->avatar != 'assets/media/avatars/avatar-1.jpg' && $user->avatar != 'assets/media/avatars/blank.png') src="{{asset($user->img)}}" @else src="{{asset('assets/media/avatars/engine.png')}}" @endif  alt="Personalizado" style="width: 100%;">
														<span class="text-muted text-center mt-2">
															Personalizado
														</span>
													</label>
												</div>
												<div class="col-sm-3 mb-10">
													<input type="radio" class="btn-check" name="logo" value="vacio" id="vacio" @if($user->avatar == 'assets/media/avatars/blank.png') checked="checked" @endif />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center flex-column justify-content-center" for="vacio">
														<img src="{{asset('assets/media/avatars/blank.png')}}" alt="Sin logo" style="width: 100%;">
														<span class="text-muted text-center mt-2">
															Sin logo
														</span>
													</label>
												</div>
												<div class="col-sm-3 mb-10">
													<input type="radio" class="btn-check" name="logo" value="hombre" id="hombre" @if($user->avatar == 'assets/media/avatars/avatar-1.jpg') checked="checked" @endif />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center flex-column justify-content-center" for="hombre">
														<img src="{{asset('assets/media/avatars/avatar-1.jpg')}}" alt="Hombre" style="width: 100%;">
														<span class="text-muted text-center mt-2">
															Hombre
														</span>
													</label>
												</div>
												<div class="col-sm-3 mb-10">
													<input type="radio" class="btn-check" name="logo" value="mujer" id="mujer" @if($user->avatar == 'assets/media/avatars/avatar-2.jpg') checked="checked" @endif />
													<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center flex-column justify-content-center" for="mujer">
														<img src="{{asset('assets/media/avatars/avatar-2.jpg')}}" alt="Mujer" style="width: 100%;">
														<span class="text-muted text-center mt-2">
															Mujer
														</span>
													</label>
												</div>
											</div>
										</div>
										<x-input type="file" name="avatar" label="Selecciona el logo" placeholder="Selecciona el logo"/>
										<x-formbtn text="Actualizar" color="warning"/>
									</div>
							</form>
			</div>
		</div>
	</div>
	<div class="col-12 mt-4">
		<div class="card h-100 mb-6">
			<div class="card-header">
				<h3 class="card-title">Cambiar Contraseña</h3>
			</div>
			<div class="card-body">
				<form validate-option="1" class="axios-form" method="POST" action="{{route('user.password', ['user' => $user->id])}}" class="my-auto pb-5" novalidate="novalidate" id="kt_change_pw">
					<div class="w-100">
						<div class="">
							<h2 class="fw-bolder text-dark">Cambiar contraseña</h2>
						</div>
						@csrf
						<x-input name="old_password" label="Contraseña Actual" placeholder="Ingresa tu contraseña actual" type="password"/>
						<x-input name="new_password" label="Contraseña nueva" placeholder="Ingresa tu nueva contraseña" type="password"/>
						<x-input name="new_password_confirm" label="Confirmar Contraseña Nueva" placeholder="Confirma tu nueva contraseña" type="password"/>
						<x-formbtn text="Cambiar Contraseña" color="warning"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-12 mt-4">
		<div class="card h-100 mb-6">
			<div class="card-header">
				<h3 class="card-title">Eliminar Cuenta</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="w-100">
{{-- 						<div class="">
							<h2 class="fw-bolder text-dark">Cambiar contraseña</h2>
						</div>
						@csrf
						<x-input name="old_password" label="Contraseña Actual" placeholder="Ingresa tu contraseña actual" type="password"/>
						<x-input name="new_password" label="Contraseña nueva" placeholder="Ingresa tu nueva contraseña" type="password"/>
						<x-input name="new_password_confirm" label="Confirmar Contraseña Nueva" placeholder="Confirma tu nueva contraseña" type="password"/> --}}
						<h3 class="card-title">Texto descripción para eliminar la cuenta.</h3>
						<x-formbtn text="Quiero eliminar mi cuenta" color="danger"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	
	@endcan
</div>

@endsection

@push('js-scripts')
<script>
	@can('update', $user)
		$('#sel_pais').val('{{$user->pais}}');
	@endcan
	@cannot('update', $user)
		@if ($user->tieneConexionPendiente())
			@if (!auth()->user()->envioConexion($user))
				let status = '';
				let btnAceptar = document.getElementById('aceptarBtn');
				let btnRechazar = document.getElementById('rechazarbtn');

				btnAceptar.addEventListener('click', (evt) => {
					status = 'aceptar';
				});

				btnRechazar.addEventListener('click', (evt) => {
					status = 'rechazar';
				});
			@endif
		@else
			@if (!$user->tieneConexionAceptada($user))
				let btn = document.getElementById('conexionBtn');
			@endif
		@endif
		let successFunction = () => {
			@if ($user->tieneConexionPendiente())
				@if (!auth()->user()->envioConexion($user))
					btnAceptar.disabled = true;
					btnRechazar.disabled = true;
					if (status == 'aceptar') {
						btnAceptar.innerHTML = 'Conectado';
						btnRechazar.classList.add('d-none');
					} else {
						btnRechazar.innerHTML = 'Conexión Rechazada';
						btnAceptar.classList.add('d-none');
					}
				@endif
			@else
				@if (!$user->tieneConexionAceptada($user))
					btn.innerHTML = 'Solicitud de conexión enviada';
					btn.disabled = true;
				@endif
			@endif
		}
	@endcan
    let validateOptions = {
    	0: {
	        fields: {
	            'nombre': {
							validators: {
								notEmpty: {
									message: 'Debes de llenar el nombre'
								},
								stringLength: {
									min: 4,
									max: 255,
									message: 'El nombre debe ser entre 4 y 255 carácteres'
								}
							}
						},
						'email': {
							validators: {
								notEmpty: {
									message: 'Debes de llenar el email'
								},
								emailAddress: {
									message: 'El campo debe de ser un email'
								}
							}
						},
						'pais': {
							validators: {
								notEmpty: {
									message: 'Debes de ingresar un país'
								}
							}
						},
						'estado': {
							validators: {
								notEmpty: {
									message: 'Debe seleccionar un estado'
								}
							}
						},
						'industria': {
							validators: {
								notEmpty: {
									message: 'Debe seleccionar una industria'
								},
								digits: {
									message: 'Debes seleccionar una industria de la lista'
								}
							}
						},
						'avatar': {
							validators: {
								file: {
				                    extension: 'png,jpg,jpeg',
				                    message: "{{__('input.invalid.file', ['ext' => 'png, jpg, jpeg'])}}"
				                }
							}
						},
	        }
	    },
	    1: {
	    	fields: {
	    		'new_password': {
						validators: {
							notEmpty: {
								message: 'Debe ingresar una contraseña'
							},
							stringLength: {
								min: 4,
								max: 32,
								message: 'La contraseña debe ser entre 4 y 32 carácteres'
							}
						}
					},
					'new_password_confirm': {
						validators: {
							callback: {
								message: 'Las contraseñas deben de coincidir',
								callback: function(input) {
									const value = input.value;
									let pw = document.querySelector('[name="password"]');
									if (pw.value != value) {
										return {
											valid: false
										};
									}
									return {
										valid: true
									};
								}
							}
						}
					},
	    	}
	    }
    }
</script>
<script src="{{asset('js/form-confirm.js')}}" type="text/javascript" charset="utf-8" async defer></script>
<script src="{{asset('js/form.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endpush