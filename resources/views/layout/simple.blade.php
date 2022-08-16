<!DOCTYPE html>
<html lang="en">
	<head><base href="">
		<title>@yield('title', config('app.name'))</title>
		<meta charset="utf-8" />
		<meta name="description" content="Enti" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="es_MX" />
		<link rel="shortcut icon" href="{{url('enti/logo.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/bootstrap-multiselect-showselected.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/bootstrap-multiselect-showselected.min.css')}}" rel="stylesheet" type="text/css" />
		</head>
	@section('content')
		SIN CONTENIDO
	@show
	@routes
	<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages ooo)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('js/app.js') }}"></script>
		<script src="{{asset('js/swal.js') }}"></script>
		<script src="{{asset('js/register.js') }}"></script>
		<script src="{{asset('js/bootstrap-multiselect-showselected.js') }}"></script>
      	<script src="{{asset('js/bootstrap-multiselect-showselected.min.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page ooo)-->
		<script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page ooo)-->
		<script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
		@stack('js-scripts')
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
</html>