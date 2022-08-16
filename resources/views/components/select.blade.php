<div id="inp_{{$name}}" class="{{$mb??'mb-4'}} {{$col??'col-md-12'}} fv-row">
    <label class="form-label @if(!isset($required) || $required) required @endif mb-3">{{$label??$name}}</label>
    <select id="sel_{{$name}}" name="{{$name}}" class="form-select {{$class??''}} form-select-solid" data-control="select2" data-placeholder="{{$placeholder??($label??$name)}}" data-allow-clear="true" data-hide-search="true">
        {{$values}}
    </select>
</div>