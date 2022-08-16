@extends('layout.profile')
@section('title',  "Industrias/Sectores")

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">Industrias/Sectores</h4>
        <div class="card-toolbar">
        	<button  type="button" data-bs-toggle="tooltip" id="crearBtn" data-bs-placement="bottom" title="Nueva Industria/Sector" class="btn ms-2 btn-success">Nueva Industria/Sector</button>
        </div>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-hover table-bordered align-middle gy-1 gs-3">
            <thead>
                <tr class="fw-bold fs-7 text-muted">
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modals')
<x-modal id="crearModal" route="{{route('industrias.store')}}" title="Nueva Industria/Sector" color="success">
	<x-input name="nombre" label="Nombre" placeholder="Ingresa el nombre"/>
	<x-input name="descripcion" label="Descripción" placeholder="Ingresa la descripción"/>
</x-modal>
<x-modal dynamic="true" id="editarModal" route="{{route('industrias.update', ['industria' => 'industriaId'])}}" color="warning" title="Editar Industria/Sector">
@method('PUT')
	<x-input name="nombre" label="Nombre" placeholder="Ingresa el nombre"/>
	<x-input name="descripcion" label="Descripción" placeholder="Ingresa la descripción"/>
</x-modal>
@endsection

@push('css-scripts')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('js-scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    var crearModalContainer = document.getElementById('crearModal')
    var crearModal = new bootstrap.Modal(crearModalContainer, {});
    var botonCrearCategorias = document.getElementById('crearBtn');
    botonCrearCategorias.addEventListener('click', (evt) => {
        crearModal.show();
    });

    var editarCategoriaModalContainer = document.getElementById('editarModal');
    let editarCategoriaForm = editarCategoriaModalContainer.querySelector('form');
    var editarModal = new bootstrap.Modal(editarCategoriaModalContainer, {});
    let urlEditar = "{{route('industrias.edit', ['industria' => 'industriaId'])}}";
    let urlActualizar = "{{route('industrias.update', ['industria' => 'industriaId'])}}";
    let common80 = {
        notEmpty: {
            message: "{{__("input.invalid.empty")}}"
        },
        stringLength: {
            min: 4,
            max: 255,
            message: "{{__("input.invalid.length", ['min' => 2, 'max' => 80])}}"
        }
    };

    let validateOptions = {
        fields: {
            "nombre": {
                validators: common80
            },
            "descripcion": {
                validators: common80
            },
        }
    }

    let successFunction = function() {
        table.ajax.reload();
        elements = crearModalContainer.querySelectorAll('input');
        for (var i = 0; i < elements.length; i++) {
            elements[i].value ="";
        }
        crearModal.hide();
        editarModal.hide();
    };
</script>
<x-datatable dbroute="{{route('industrias.index')}}" id="datatable">
    <x-slot name="order">
        [0, 'asc']
    </x-slot>
    <x-slot name='columns'>
    [
        {data: 'nombre', name: 'nombre'},
        {data: 'descripcion', name: 'descripcion'},
        {render: function (data, type, row, meta) {
            return `
            <div class="d-flex">
                <button for-id="${row['id']}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Industria/Sector" class="btn border border-2 me-2 btn-sm btn-icon btn-bg-light btn-active-color-warning editarBotones">
                    <i class="fas fa-edit"></i>
                </button>
            </div>`;
        }}
    ]
    </x-slot>
    <x-slot name='callback'>
        var editarBotones = document.querySelectorAll('.editarBotones');
        for (var i = 0; i < editarBotones.length; i++) {
            editarBotones[i].addEventListener('click', async (evt) => {
                let id = evt.currentTarget.getAttribute('for-id');
                let url = urlEditar.replace('industriaId', id);

                await axios.get(url, {})
                .then((result) => {
                    editarCategoriaForm.querySelector('input[name="nombre"]').value = result.data.industria.nombre;
                    editarCategoriaForm.querySelector('input[name="descripcion"]').value = result.data.industria.descripcion;
                    editarCategoriaForm.action = urlActualizar.replace('industriaId', id);
                })
                .finally((result) => {
                    editarModal.show();
                });
            });
        }
    </x-slot>
</x-datatable>
<script src="{{ asset('js/form.js') }}"></script>
@endpush