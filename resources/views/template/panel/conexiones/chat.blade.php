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
@endsection