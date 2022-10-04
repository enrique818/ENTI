<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\oferr;
use App\Models\User;

class Ofertacontroller extends Controller
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
    * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $chat = Chat::chatWithUser($user)->first();
        if ($chat->user_one_id == $user->id) {
            $type = 'two';
        } else {
            $type = 'one';
        }


        $user = auth()->user();
        $request->validate([
            'precio_oferta' => 'required',
            'descripcion_proyecto' => 'required',
            'plazo_proyecto' => 'required'
        ]);
        
        $oferrs = new oferr;
        
        $oferrs->user_id = $request->user()->id;
        $oferrs->chat_id =  $request->input('chat_id');        
        $oferrs->precio_oferta = $request->input('precio_oferta');
        $oferrs->descripcion_proyecto = $request->input('descripcion_proyecto');
        $oferrs->plazo_proyecto = $request->input('plazo_proyecto');

        $oferrs->save();
        return back()->with('success','Datos enviado exitosamente');
        
        
    
}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
