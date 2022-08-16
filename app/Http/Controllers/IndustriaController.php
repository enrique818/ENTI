<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use App\Http\Requests\StoreIndustriaRequest;
use App\Http\Requests\UpdateIndustriaRequest;

use Illuminate\Http\Request;
use DataTables;

class IndustriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Industria::class);
        if ($request->ajax()) {
            $data = Industria::get();
            return Datatables::of($data)
                    ->make(true);
        }
        return view('template.panel.industrias.list');
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
     * @param  \App\Http\Requests\StoreIndustriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndustriaRequest $request)
    {
        $this->authorize('viewAny', Industria::class);
        $industria = Industria::create($request->validated());
        return response()->json([
            'message' => "Se ha creado la industria ".$industria->nombre,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function show(Industria $industria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function edit(Industria $industria)
    {
        $this->authorize('viewAny', Industria::class);
        return response()->json([
            'industria' => $industria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndustriaRequest  $request
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndustriaRequest $request, Industria $industria)
    {
        $this->authorize('viewAny', Industria::class);
        $industria->fill($request->validated())->save();
        return response()->json([
            'message' => "Se ha editado la industria ".$industria->nombre,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industria $industria)
    {
        //
    }
}
