@extends('layout.profile')
@section('title',  "Chat")

@section('content')
<div class="card" id="kt_chat_messenger">
	<input type="hidden" name="chatUserId" id="chatUserId"
		@if(Auth::user()->id == $chat->userOne->id)
		value="{{$chat->userTwo->id}}"
		@else
		value="{{$chat->userOne->id}}"
		@endif
	>
	@if(session('success'))	
	<div class="alert alert-success" role="success">
		{{ session('success') }}
	</div>
	@endif
	@if($errors->any())
	<div class="alert alert-danger">
		<p>Por favor llenar todos los campos del formulario y asi poder ser enviado los datos correctamente</p>
	</div>
	@endif
	
	<div class="card-header" id="kt_chat_messenger_header">
			<div class="card-title">
			<div class="d-flex justify-content-center flex-column me-3">
				<a href="{{route('user.show', ['user' => $user->id])}}" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$user->nombre}}</a>
			</div>
		</div>
	</div>
	<div class="card-body" id="kt_chat_messenger_body">
		<chat-messages :user="{{ Auth::user() }}" :messages="messages"></chat-messages>
	</div>
		<chat-form
            v-on:messagesent="addMessage"
            :chat="{{ $chat }}"
            :user="{{ Auth::user() }}"
            sender="{{ $chat->userOne->id == Auth::user()->id ? 'one' : 'two' }}"
        ></chat-form>
</div>
@if(auth()->user()->perfil == 'startup' || auth()->user()->isAdmin)
<div class="flex-equal text-end ms-1">
	<div class="mt-5">
		<button type="button" class="btn btn-rosa mx-1" style="float:left;" data-toggle="modal" data-target="#ofertaModal">
			Contratar
		  </button>
		  <!-- Modal -->
		  <div class="modal fade" id="ofertaModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Enviar oferta</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>	 
				<form action="{{route('user.store', ['user' => $user->id])}}" method="POST" class="formulario-enviar">
					{{ csrf_field()}}	
				<div class="modal-body">
		          @if($user->id == auth()->user()->id)			     
				 <input type="hidden" value="{{$user->id}}" name="user_id">
		         @endif		
				 @if(Auth::user()->id == $chat->userOne->id)
				 <input type="hidden" value="{{$chat->id}}" name="chat_id">
				 @endif			
					<x-input name="precio_oferta" label="Precio de la oferta" placeholder="Ingrese el precio de la oferta" value="{{ old('precio_oferta') }}" />
					@error('precio_oferta')
					<small style="color:red">{{ $message }}</small>
					@enderror
					<x-textarea name="descripcion_proyecto" label="Descripción del proyecto" cols="20" rows="10" placeholder="Describa el contenido del proyecto" value="{{ old('descripcion_proyecto') }}"/>
					@error('descripcion_proyecto')
					<small style="color:red">{{ $message }}</small>
					@enderror
					<x-textarea name="plazo_proyecto" label="Plazo estimado del proyecto" placeholder="Describa plazo estimado del proyecto" value="{{ old('plazo_proyecto') }}"/>
					@error('plazo_proyecto')
					<small style="color:red">{{ $message }}</small>
					@enderror
					</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				  <button type="submit" id="btnresult" class="btn btn-primary">Enviar</button>
				</div>
			</form>
			  </div>
			</div>
		  </div>
</div>
</div>
@endif
@if(auth()->user()->perfil == 'expertos' || auth()->user()->isAdmin)
<div class="flex-equal text-end ms-1">
	<div class="mt-5">
		<button type="button" class="btn btn-rosa mx-1" style="float:left;" data-toggle="modal" data-target="#contratarModal">
			Enviar oferta
		  </button>
		  
		  <!-- Modal -->
		  <div class="modal fade" id="contratarModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Proyectos propuestos</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<form action="{{route('user.store', ['user' => $user->id])}}" method="POST"  class="formulario-enviar">
					{{ csrf_field()}}
				<div class="modal-body">	
					@if($user->id == auth()->user()->id)			     
					<input type="hidden" value="{{$user->id}}" name="user_id">
					@endif						
					<x-input  name="precio_oferta" id="precio_oferta" label="Precio de la oferta" placeholder="Ingrese el precio de la oferta"  value="{{ old('precio_oferta') }}"/>
					@error('precio_oferta')
					<small style="color:red">{{ $message }}</small>
					@enderror
					<x-textarea name="descripcion_proyecto" id="descripcion_proyecto" label="Descripción del proyecto" placeholder="Describa el contenido del proyecto" value="{{ old('descripcion_proyecto') }}"/>
					@error('descripcion_proyecto')
					<small style="color:red">{{ $message }}</small>
					@enderror
					<x-textarea name="plazo_proyecto" id="plazo_proyecto" label="Plazo estimado del proyecto" placeholder="Describa plazo estimado del proyecto" value="{{ old('plazo_proyecto') }}"/>
					@error('plazo_proyecto')
					<small style="color:red">{{ $message }}</small>
					@enderror
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				  <button type="submit" id="btnresult" class="btn btn-primary">Enviar</button>
				</div>
			</form>
			  </div>
			</div>
		  </div>
</div>
</div>
@endif
@endsection
@push('js-scripts')

@if(session('success')=='Datos enviado exitosamente')
<script>
Swal.fire('Datos enviado exitosamente!', '', 'success')
</script>	
@endif

<script>
$('.formulario-enviar').submit(function(e){
e.preventDefault();

Swal.fire({
  title:'¿Estás seguro de enviar la oferta?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }

  this.submit();
})

});


</script>
@endpush