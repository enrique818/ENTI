<div id="inp_{{$name}}" class="{{$mb??'mb-4'}} {{$col??'col-md-12'}} fv-row">
    <label class="form-label @if(!isset($required) || $required) required @endif mb-3">{{$label??$name}}</label>
    <div class="input-group input-group-solid mb-5">
        {{$before??''}}
        <input type="{{$type??'text'}}" class="form-control {{$class??''}}" name="{{$name}}" placeholder="{{$placeholder??($label??$name)}}" value="{{$value??''}}" />
        {{$after??''}}
    </div>
</div>