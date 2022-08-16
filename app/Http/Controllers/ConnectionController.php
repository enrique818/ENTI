<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\User;
use App\Http\Requests\StoreConnectionRequest;
use App\Http\Requests\UpdateConnectionRequest;
use App\Events\ConnectionSent;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudConexion;

class ConnectionController extends Controller
{
    public function send(User $user)
    {
        $con = Connection::create([
            'sender' => auth()->user()->id,
            'receiver' => $user->id,
            'status' => 'pendiente'
        ]);

        broadcast(new ConnectionSent($con))->toOthers();

        Mail::to($user->email)->send(new SolicitudConexion($con));

        return response()->json([
            'message' => 'Solicitud de conexión enviada'
        ]);
    }

    public function accept(Connection $connection)
    {
        $connection->status = 'aceptado';
        $connection->save();
        return response()->json([
            'message' => 'Solicitud de conexión aceptada'
        ]);
    }

    public function decline(Connection $connection)
    {
        $connection->status = 'rechazado';
        $connection->save();
        return response()->json([
            'message' => 'Solicitud de conexión rechazada'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response()->json($user->conexionesPendientes);
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
     * @param  \App\Http\Requests\StoreConnectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConnectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function show(Connection $connection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function edit(Connection $connection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConnectionRequest  $request
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConnectionRequest $request, Connection $connection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connection $connection)
    {
        //
    }
}
