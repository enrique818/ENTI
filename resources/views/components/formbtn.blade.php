<button type="submit" class="btn btn-sm btn-{{$color??'primary'}}">
    <span class="indicator-label">
        {{$text??'Continuar'}}
    </span>
    <span class="indicator-progress">
    {{$loading??'Procesando...'}} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>