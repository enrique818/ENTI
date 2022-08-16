<div class="modal fade" tabindex="-1" id="{{$id}}">
    <div class="modal-dialog {{$modal}}">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">{{$title}}</h5>
                <div class="btn btn-icon btn-sm btn-active-light-{{$color}} ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
            </div>
            <form id="form_{{$id}}" class="axios-form" action="{{$route}}" method="POST" accept-charset="utf-8">
                @csrf
                <div class="modal-body py-2">
                    <div class="row">
                        {{$slot}}
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn sendBtn btn-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <x-formbtn text="Guardar" :color="$color" />
                </div>
            </form>
        </div>
    </div>
</div>