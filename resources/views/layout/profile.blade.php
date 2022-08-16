<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('title', config('app.name'))</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="es_MX" />
		<link rel="shortcut icon" href="{{asset('enti/logo.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		@stack('css-scripts')
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<input type="hidden" name="userId" id="userId" value="{{Auth::user()->id}}">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					@include('layout.partials.header')
					<div class="d-flex flex-column-fluid">
						<div id="kt_aside" class="aside card" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
							<div class="aside-menu flex-column-fluid px-5">
								<div class="hover-scroll-overlay-y my-5 pe-4 me-n4" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{lg: '75px'}">
									@include('layout.partials.aside')
								</div>
							</div>
						</div>
						<div class="d-flex flex-column flex-column-fluid container-fluid">
							<div class="content flex-column-fluid" id="kt_content">
								@section('content')
									<div class="d-flex w-100 h-100 justify-content-center align-items-center">
										<h1>Página en construccion... <i class="fas ms-4 fa-tools fs-1 text-dark"></i></h1>
									</div>
								@show
							</div>
							<div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
								<div class="text-dark order-2 order-md-1">
									<span class="text-muted fw-bold me-1">2022© Enti</span>
									<!-- <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Enti</a> -->
								</div>
								<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
									<!-- <li class="menu-item">
										<a href="#" target="_blank" class="menu-link px-2">About</a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('layout.partials.drawer')
		@yield('modals')
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
		</div>
		@routes
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages nnn)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('js/app.js') }}"></script>
		<script src="{{asset('js/swal.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page nnn)-->
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page nnn)-->
		<!-- <script src="{{asset('assets/js/custom/widgets.js')}}"></script> -->
		<!-- <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script> -->
		<script src="{{asset('assets/js/custom/modals/create-app.js')}}"></script>
		<script src="{{asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
		@stack('js-scripts')
	</body>
</html>