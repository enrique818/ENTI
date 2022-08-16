<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use App\Events\MessageSent;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevoMensaje;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('view', $user);
        $me = auth()->user();
        $chat = Chat::chatWithUser($user)->first();
        if (!$chat) {
            $chat = Chat::create([
                'user_one_id' => $me->id,
                'user_two_id' => $user->id
            ]);
        }
        return view('template.panel.conexiones.chat', ['user' => $user,  'chat' => $chat->with(['userOne', 'userTwo'])->where('id', $chat->id)->first()]);
    }

    public function all(User $user)
    {
        $chat = Chat::chatWithuser($user)->first();
        return $chat->messages()->orderByDesc('created_at')->with(['chat', 'chat.userOne', 'chat.userTwo'])->take(50)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreChatRequest $request)
    {
        $chat = Chat::chatWithUser($user)->first();
        if ($chat->user_one_id == $user->id) {
            $type = 'two';
        } else {
            $type = 'one';
        }
        $message = $chat->messages()->create([
            'sender' => $type,
            'mensaje' => $request->input('mensaje')
        ]);

        $data = array(
            'envia' => auth()->user()->nombre, 
            'Recive' => $user->nombre,
            'url' =>  strval('https://myenti.com/panel/usuarios/'.auth()->user()->id.'/chat'),            
        );

        Mail::to($user->email)->send(new NuevoMensaje($data));
        //return back()->with('success', 'Enviado exitosamente!');

        broadcast(new MessageSent($message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
