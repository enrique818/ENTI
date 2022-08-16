@extends('layout.profile')
@section('title',  "Usuario - Administrador")

@section('content')
<div class="row align-items-stretch">
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$startups}}</div>
                    <div class="text-muted fw-bold fs-6">Startups</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$firmas}}</div>
                    <div class="text-muted fw-bold fs-6">Inversionistas de Capital</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$inversionistas}}</div>
                    <div class="text-muted fw-bold fs-6">Angeles Inversionistas</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$expertos}}</div>
                    <div class="text-muted fw-bold fs-6">Expertos de Industria</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$mentores}}</div>
                    <div class="text-muted fw-bold fs-6">Mentores/Centros de Formación de Emprendimiento</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex flex-column">
                    <div class=" fw-bolder fs-1 mb-0 mt-5">{{$influencers}}</div>
                    <div class="text-muted fw-bold fs-6">Influencers</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mt-4">
    <div class="card-header">
        <h4 class="card-title">Usuarios</h4>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-hover table-bordered align-middle gy-1 gs-3">
            <thead>
                <tr class="fw-bold fs-7 text-muted">
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>País</th>
                    <th>Industria/Sector</th>
                    <th>Estado de Emprendimiento</th>
                    <th>Descripción</th>
                    <th>Twitter</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>LinkedIn</th>
                    <th>Youtube</th>
                    <th>Web</th>
                    <th>Ventas</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modals')
@endsection

@push('css-scripts')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('js-scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<x-datatable name="table" :multi="false" dbroute="{{route('user.index')}}" id="datatable">
    <x-slot name="order">
        [0, 'asc']
    </x-slot>
    <x-slot name='columns'>
    [
        {data: 'nombre', name: 'nombre'},
        {data: 'email', name: 'email'},
        {data: 'perfil_e', name: 'perfil_e'},
        {data: 'pais', name: 'pais'},
        {data: 'industria', name: 'industria'},
        {data: 'estado', name: 'estado'},
        {render: function (data, type, row, meta) {
            return `<span class="text-truncate">${row['descripcion']}</span>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['twitter'] == null) {
                return "-";
            }
            return `<a href="${row['twitter']}" class=" text-hover-primary">Twitter</a>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['facebook'] == null) {
                return "-";
            }
            return `<a href="${row['facebook']}" class=" text-hover-primary">Facebook</a>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['instagram'] == null) {
                return "-";
            }
            return `<a href="${row['instagram']}" class=" text-hover-primary">Instagram</a>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['linkedin'] == null) {
                return "-";
            }
            return `<a href="${row['linkedin']}" class=" text-hover-primary">LinkedIn</a>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['youtube'] == null) {
                return "-";
            }
            return `<a href="${row['youtube']}" class=" text-hover-primary">Youtube</a>`;
        }},
        {render: function (data, type, row, meta) {
            if (row['web'] == null) {
                return "-";
            }
            return `<a href="${row['web']}" class=" text-hover-primary">Web</a>`;
        }},
        {data: 'ventas_d', name: 'ventas_d'},

    ]
    </x-slot>
    <x-slot name='callback'>
    </x-slot>
</x-datatable>
@endpush