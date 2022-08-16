@extends('layout.simple')
@section('title',  "Landing Page")

@section('content')
	<body id="inicio" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
		<div class="d-flex flex-column flex-root">
			<div class="mb-0" id="home">
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url({{asset('assets/media/svg/illustrations/landing.svg')}})">
					<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<div class="container">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center flex-equal">
									<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
											</svg>
										</span>
									</button>
									<a href="{{route('landing')}}">
										<img alt="Logo" src="{{asset('enti/logo-dark.png')}}" class="logo-default h-25px h-lg-30px" />
										<img alt="Logo" src="{{asset('enti/logo.png')}}" class="logo-sticky h-20px h-lg-25px" />
									</a>
								</div>
								<div class="d-lg-block" id="kt_header_nav_wrapper">
									<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#inicio', lg: '#kt_header_nav_wrapper'}">
										<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
											<div class="menu-item">
												<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#inicio" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Inicio</a>
											</div>
											<div class="menu-item">
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#servicios" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Servicios</a>
											</div>
											<div class="menu-item">
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#comunidad" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Comunidad</a>
											</div>
											<div class="menu-item">
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#perfiles" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Perfiles</a>
											</div>
										</div>
									</div>
								</div>
								<div class="flex-equal text-end ms-1">
									@guest
									<a href="{{route('login.page')}}" class="btn btn-rosa mx-2">Inicia Sesión</a>
									<a href="{{route('register.page')}}" class="btn btn-rosa mx-2">Registrate</a>
									@endguest
									@auth
									<a href="{{route('panel')}}" class="btn btn-rosa mx-2">Panel</a>
									@endauth
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
						<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
							<h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">@guest Bienvenidos @endguest @auth Bienvenido @endauth a En<span class="text-primary">ti</span>
							@auth
							<br />{{auth()->user()->nombre}}
							@endauth</h1>
							@guest
							<a href="{{route('login.page')}}" class="btn btn-primary mx-2">Inicia Sesión</a>
							<a href="{{route('register.page')}}" class="btn btn-primary mx-2">Registrate</a>
							@endguest
							@auth
							<a href="{{route('panel')}}" class="btn btn-primary mx-2">Panel</a>
							@endauth
						</div>
					</div>
				</div>
				<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
			</div>
			<div class="mb-n10 mb-lg-n20 z-index-2">
				<div class="container">
					<div class="text-center mb-17">
						<h3 class="fs-2hx text-dark mb-5" id="servicios" data-kt-scroll-offset="{default: 100, lg: 150}">Nuestros Servicios</h3>
						<div class="fs-5 text-muted fw-bold">
							La primer plataforma en América Latina en ofrecer servicios de 
							<br />emprendimiento todo en uno para los emprendedores de la región.
							<br />A través de nuestros cursos especializados, conexiones
							<br />con los actores del ecosistema emprendedor, y alianzas
							<br />estratégicas, Enti te permitirá hacer crecer
							<br />tus ideas o negocios en marcha.
						</div>
					</div>
					<div class="row w-100 gy-10 mb-md-20">
						<div class="col-md-4 px-5">
							<div class="text-center mb-10 mb-md-0">
								<img src="{{asset('assets/media/illustrations/unitedpalms-1/12.png')}}" class="mh-125px mb-9" alt="" />
								<div class="d-flex flex-center mb-5">
									<span class="badge badge-circle badge-light-rosa fw-bolder p-5 me-3 fs-3">1</span>
									<div class="fs-5 fs-lg-3 fw-bolder text-dark">Conexiones profesionales</div>
								</div>
								<div class="fw-bold fs-6 fs-lg-4 text-muted">Puedes encontrar a el inversionista,
								<br />profesional o influencer para impulsar
								<br />tu negocio</div>
							</div>
						</div>
						<div class="col-md-4 px-5">
							<div class="text-center mb-10 mb-md-0">
								<img src="{{asset('assets/media/illustrations/sigma-1/13.png')}}" class="mh-125px mb-9" alt="" />
								<div class="d-flex flex-center mb-5">
									<span class="badge badge-circle badge-light-rosa fw-bolder p-5 me-3 fs-3">2</span>
									<div class="fs-5 fs-lg-3 fw-bolder text-dark">Cursos y Formación Académica</div>
								</div>
								<div class="fw-bold fs-6 fs-lg-4 text-muted">Podrás encontrar varios cursos dentro de
								<br />nuestra plataforma para aumentar tus
								<br />habilidades profesionales</div>
							</div>
						</div>
						<div class="col-md-4 px-5">
							<div class="text-center mb-10 mb-md-0">
								<img src="{{asset('assets/media/illustrations/sigma-1/9.png')}}" class="mh-125px mb-9" alt="" />
								<div class="d-flex flex-center mb-5">
									<span class="badge badge-circle badge-light-rosa fw-bolder p-5 me-3 fs-3">3</span>
									<div class="fs-5 fs-lg-3 fw-bolder text-dark">Alianzas en Servicios Estratégicos</div>
								</div>
								<div class="fw-bold fs-6 fs-lg-4 text-muted">Encuentra la plataforma correcta para
								<br />impulsar tu empresa en temas contables,
								<br />legales, soporte, web, etc...</div>
							</div>
						</div>
					</div>
					<div class="tns tns-default d-flex justify-content-center">
						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10" style="width: 80%;">
							<video class="card-rounded shadow mw-100" autobuffer controls>
								<source src="{{asset('enti/presentacion.mp4')}}">
							</video>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-sm-n10">
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<div class="pb-15 pt-18 landing-dark-bg">
					<div class="container">
						<div class="text-center mt-15 mb-18" id="comunidad" data-kt-scroll-offset="{default: 100, lg: 150}">
							<h3 class="fs-2hx text-white fw-bolder mb-5">Comunidad</h3>
							<div class="fs-5 text-gray-700 fw-bold">Unete a nuestra comunidad y
							<br />se parte de miles de usuarios que
							<br />encuentran conexiones todos los días
							</div>
						</div>
						<div class="d-flex flex-center">
							<!--begin::Items-->
							<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
								<!--begin::Item-->
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('{{asset("assets/media/svg/misc/octagon.svg")}}')">
									<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
											<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
										</svg>
									</span>
									<div class="mb-0">
										<div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="50" data-kt-countup-suffix="+">0</div>
										</div>
										<span class="text-gray-600 fw-bold fs-5 lh-0">StartUps</span>
									</div>
								</div>
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('{{asset('assets/media/svg/misc/octagon.svg')}}')">
									<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="black" />
											<path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="black" />
											<path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="black" />
										</svg>
									</span>
									<div class="mb-0">
										<div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="10" data-kt-countup-suffix="+">0</div>
										</div>
										<span class="text-gray-600 fw-bold fs-5 lh-0">Inversionistas</span>
									</div>
								</div>
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('{{asset('assets/media/svg/misc/octagon.svg')}}')">
									<span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
											<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
											<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
										</svg>
									</span>
									<div class="mb-0">
										<div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="100" data-kt-countup-suffix="+">0</div>
										</div>
										<span class="text-gray-600 fw-bold fs-5 lh-0">Conexiones creadas</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
			</div>
			<div class="mt-20 mb-n20 position-relative z-index-2">
				<div class="container">
					<div class="text-center mb-12">
						<h3 class="fs-2hx text-dark mb-5" id="perfiles" data-kt-scroll-offset="{default: 100, lg: 150}">Perfiles de Usuarios</h3>
					</div>
					<div class="tns tns-default mb-15">
						<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/1.png')}}');"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.startup')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Mejora tu emprendimiento</div>
								</div>
							</div>
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/10.png')}}')"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.firma')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Invertir en empresas con cierta tracción</div>
								</div>
							</div>
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/6.png')}}')"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.inversionista')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Invertir en empresas en etapas muy tempranas</div>
								</div>
							</div>
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/9.png')}}')"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.expertos')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Asesora startups en tu industria</div>
								</div>
							</div>
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/19.png')}}')"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.mentores')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Asesora a los emprendedores</div>
								</div>
							</div>
							<div class="text-center">
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{asset('assets/media/illustrations/dozzy-1/7.png')}}')"></div>
								<div class="mb-0">
									<a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{__('categorias.influencer')}}</a>
									<div class="text-muted fs-6 fw-bold mt-1">Impulsa los negocios</div>
								</div>
							</div>
						</div>
						<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
							<span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
							<span class="svg-icon svg-icon-3x">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
								</svg>
							</span>
						</button>
					</div>
					<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #e37fb5 0%, #E93093 100%);">
						@guest
						<div class="my-2 me-5">
							<div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">Registrate ahora
							<span class="fw-normal">y comienza a emprender</span></div>
							<div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">O a encontrar emprendedores a los que impulsar</div>
						</div>
						<a href="{{route('register.page')}}" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Registrate</a>
						@endguest
						@auth
						<div class="my-2 me-5">
							<div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2"><span class="fw-normal">Comienza a </span> realizar conexiones</div>
							<div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Accede a tu panel para ver tus oportunidades</div>
						</div>
						<a href="{{route('panel')}}" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Panel</a>
						@endauth
					</div>
				</div>
			</div>
			<div class="mb-0">
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<div class="landing-dark-bg pt-20">
					<div class="container">
						<div class="row py-10 py-lg-20">
							<div class="col-lg-8 pe-lg-16 mb-10 mb-lg-0">
								<div class="rounded landing-dark-border p-9 mb-10">
									<h2 class="text-white">Conviertete en una alianza dentro de nuestra plataforma</h2>
									<span class="fw-normal fs-4 text-gray-400">Registrate en
									<a href="https://myenti.com/" class="text-white opacity-80 text-hover-primary">nuestro sitio web de alianzas</a></span>
								</div>
								<div class="rounded landing-dark-border p-9 mb-10">
									<h2 class="text-white">Contáctenos para mas información</h2>
									<span class="fw-normal fs-4 text-white opacity-80">info@enti.com</span>
								</div>
							</div>
							<div class="col-lg-4 ps-lg-16">
								<div class="d-flex justify-content-center">
									<div class="d-flex fw-bold flex-column ms-lg-20">
										<h4 class="fw-bolder text-gray-400 mb-6">Conectate con nosotros</h4>
										<a href="https://www.linkedin.com/company/80265387/admin/" class="mb-6">
											<img src="{{asset('assets/media/svg/brand-logos/linkedin-2.svg')}}" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">LinkedIn</span>
										</a>
										<a href="https://www.youtube.com/channel/UCZey6WvfE8HQuHw5T_wUyEg" class="mb-6">
											<img src="{{asset('assets/media/svg/brand-logos/youtube-play.svg')}}" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
										</a>
										<a href="https://www.instagram.com/myenti.co/?hl=en" class="mb-6">
											<img src="{{asset('assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
										</a>
										<a href="https://twitter.com/MyEnti_" class="mb-6">
											<img src="{{asset('assets/media/svg/brand-logos/twitter.svg')}}" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="landing-dark-separator"></div>
					<div class="container">
						<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
							<div class="d-flex align-items-center order-2 order-md-1">
								<a href="{{route('landing')}}">
									<img alt="Logo" src="{{asset('enti/logo-dark.png')}}" class="h-15px h-md-20px" />
								</a>
								<span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">© 2022 Enti</span>
							</div>
<!-- 							<ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item mx-5">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
			<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
				<span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
						<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
					</svg>
				</span>
			</div>
		</div>
@endsection

@push('js-scripts')
<script src="{{asset('assets/js/custom/landing.js')}}"></script>
@endpush