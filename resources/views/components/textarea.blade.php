<div id="txt_{{$name}}" class="{{$mb??'mb-4'}} {{$col??'col-md-12'}} fv-row">
    <label class="form-label @if(!isset($required) || $required) required @endif mb-3">{{$label??$name}}</label>
    <textarea class="form-control {{$class??''}} form-control-solid" name="{{$name}}" placeholder="{{$placeholder??($label??$name)}}">{{$value??''}}</textarea>
</div>