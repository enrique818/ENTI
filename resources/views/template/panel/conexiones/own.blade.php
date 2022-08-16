@extends('layout.profile')
@section('title',  "Mis Chats")

@section('content')
<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Filtros</h4>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap">
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="startup" class="form-check-input" checked type="checkbox" value="yes" id="startup"/>
					    <label class="form-check-label" for="startup">
					        {{__('categorias.startup')}}
					    </label>
					</div>
					@if(auth()->user()->perfil == 'startup' || auth()->user()->isAdmin)
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="firma" class="form-check-input" checked type="checkbox" value="yes" id="firma"/>
					    <label class="form-check-label" for="firma">
					        {{__('categorias.firma')}}
					    </label>
					</div>
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="inversionista" class="form-check-input" checked type="checkbox" value="yes" id="inversionista"/>
					    <label class="form-check-label" for="inversionista">
					        {{__('categorias.inversionista')}}
					    </label>
					</div>
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="expertos" class="form-check-input" checked type="checkbox" value="yes" id="expertos"/>
					    <label class="form-check-label" for="expertos">
					        {{__('categorias.expertos')}}
					    </label>
					</div>
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="mentores" class="form-check-input" checked type="checkbox" value="yes" id="mentores"/>
					    <label class="form-check-label" for="mentores">
					        {{__('categorias.mentores')}}
					    </label>
					</div>
					<div class="ms-4 mt-3 form-check form-switch form-check-custom form-check-solid">
					    <input name="influencer" class="form-check-input" checked type="checkbox" value="yes" id="influencer"/>
					    <label class="form-check-label" for="influencer">
					        {{__('categorias.influencer')}}
					    </label>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row g-6 mb-6 g-xl-9 mb-xl-9  align-items-stretch" id="conexiones">
</div>
@endsection

@push('js-scripts')
<script>
	let conexiones = document.getElementById('conexiones');

	let checkboxes = document.querySelectorAll('input[type="checkbox"]');
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].addEventListener('change', (evt) => {buscar()});
	};

	@include('template.panel.conexiones.createCard')

	let buscar = async () => {
		let startup = document.querySelector("input[name='startup']");
		if (startup != undefined && startup.checked) {
			startupVal = startup.value;
		} else {
			startupVal = null;
		}

		let firma = document.querySelector("input[name='firma']");
		if (firma != undefined && firma.checked) {
			firmaVal = firma.value;
		} else {
			firmaVal = null;
		}

		let inversionista = document.querySelector("input[name='inversionista']");
		if (inversionista != undefined && inversionista.checked) {
			inversionistaVal = inversionista.value;
		} else {
			inversionistaVal = null;
		}

		let expertos = document.querySelector("input[name='expertos']");
		if (expertos != undefined && expertos.checked) {
			expertosVal = expertos.value;
		} else {
			expertosVal = null;
		}

		let mentores = document.querySelector("input[name='mentores']");
		if (mentores != undefined && mentores.checked) {
			mentoresVal = mentores.value;
		} else {
			mentoresVal = null;
		}

		let influencer = document.querySelector("input[name='influencer']");
		if (influencer != undefined && influencer.checked) {
			influencerVal = influencer.value;
		} else {
			influencerVal = null;
		}

		await axios.get("{{route('conexiones.chats')}}", {
			params: {
				startup: startupVal,
				firma: firmaVal,
				inversionista: inversionistaVal,
				expertos: expertosVal,
				mentores: mentoresVal,
				influencer: influencerVal,
			}
		})
		.then((response) => {
			let text = ``;
			let conections = response.data.conexiones;
			for (let key in conections) {
				text += createCard(conections[key]);
			}
			conexiones.innerHTML = text;;
		});

	};

	buscar();


</script>
@endpush