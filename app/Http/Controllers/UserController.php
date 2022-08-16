<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserInformationRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Industria;
use App\Models\User;
use App\Models\Experticia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DataTables;

class UserController extends Controller
{
    public function password(ChangePasswordRequest $request)
    {
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->input('new_password'))]);
        return response()->json([
            'message' => "Se ha actualizado la contraseña",
            // 'url' => route('user.profile')
        ]);
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $data = User::where('perfil', '!=', 'admin')->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addColumn('industria', function($row) {
                        if ($row->tieneIndustria) {
                            return $row->industria->nombre;
                        }
                        return "No aplica";
                    })
                    ->addColumn('perfil_e', function($row) {
                        return $row->rol;
                    })
                    ->addColumn('ventas_d', function($row) {
                        return $row->ventasAnuales;
                    })
                    ->make(true);
        }
        $startups = User::where('perfil', 'startup')->count();
        $firmas = User::where('perfil', 'firma')->count();
        $inversionistas = User::where('perfil', 'inversionista')->count();
        $expertos = User::where('perfil', 'expertos')->count();
        $mentores = User::where('perfil', 'mentores')->count();
        $influencers = User::where('perfil', 'influencer')->count();
        return view('template.panel.user.list', [
            'startups' => $startups, 
            'firmas' => $firmas, 
            'inversionistas' => $inversionistas, 
            'expertos' => $expertos, 
            'mentores' => $mentores, 
            'influencers' => $influencers, 
        ]);
    }

    public function create()
    {
        $industrias = [];
        foreach (Industria::orderBy('nombre')->get() as $industria) {
            $industrias[$industria->id] = $industria->nombre;
        }
       
        return view('template.auth.register', [
            'industrias' => $industrias
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->only(['nombre', 'email', 'password', 'perfil', 'pais', 'estado']);

        if ($data['perfil'] == 'startup' || $data['perfil'] == 'influencer' || $data['perfil'] == 'expertos') {
            $data['industria_id'] = $request->input('industria_id');
        }
        
        if ($data['perfil'] =='expertos'){
            $data['experticia'] = 0;
            foreach ($request->input('experticy')??[] as $key => $value) {
                $data['experticia'] += $value;
            }
        }

        if ($data['perfil'] =='influencer'){
            $data['socials_influencers'] = 0;
            foreach ($request->input('socials')??[] as $key => $value) {
                $data['socials_influencers'] += $value;
            }
        }

        $influencercont = $request->input('seguidores');
        
       $data['first_reg']  = 0;
        $data['password'] = Hash::make($data['password']);

        if ($request->input('logo') == 'personalizado') {
            $file = $request->file('avatar');
            if ($file) {
                $filename = 'avatar_' . (User::count() + 1) . '_' . time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs(
                    'avatar',
                    $file,
                    $filename
                );
                $data['avatar'] = 'storage/avatar/'.$filename;
            }
        } else if ($request->input('logo') == 'hombre') {
            $data['avatar'] = 'assets/media/avatars/avatar-1.jpg';
        } else if ($request->input('logo') == 'mujer') {
            $data['avatar'] = 'assets/media/avatars/avatar-2.jpg';
        } else {
            $data['avatar'] = 'assets/media/avatars/blank.png';
        }
        // echo $request->input('logo');
        User::create($data);
        return response()->json([
            'message' => "Usuario creado de forma exitosa"
        ]);
    }

    public function getMyConexiones(Request $request)
    {
        $user = auth()->user();

        $conexiones = $user->conexionesAceptadas;

        $usuarios = [];
        $firma = $request->input('firma');
        $startup = $request->input('startup');
        $inversionista = $request->input('inversionista');
        $expertos = $request->input('expertos');
        $mentores = $request->input('mentores');
        $influencer = $request->input('influencer');

        foreach ($conexiones as $conexion) {
            if ($conexion->sender == $user->id) {
                $tempUser = $conexion->receiverUser;
            } else {
                $tempUser = $conexion->senderUser;
            }
            if ($tempUser->perfil == 'admin') {
                $usuarios[] = $tempUser;
            }
            if ($tempUser->perfil == 'startup' && $startup && $startup == 'yes') {
                $usuarios[] = $tempUser;
            }
            if ($user->perfil == 'startup' || $user->perfil == 'admin') {
                if ($tempUser->perfil == 'firma' && $firma && $firma == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'inversionista' && $inversionista && $inversionista == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'expertos' && $expertos && $expertos == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'mentores' && $mentores && $mentores == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'influencer' && $influencer && $influencer == 'yes') {
                    $usuarios[] = $tempUser;
                }
            }
        }
        return response()->json(['conexiones' => $usuarios]);
    }

    public function getMyChats(Request $request)
    {
        $user = auth()->user();

        $chats = $user->chats;

        $usuarios = [];
        $firma = $request->input('firma');
        $startup = $request->input('startup');
        $inversionista = $request->input('inversionista');
        $expertos = $request->input('expertos');
        $mentores = $request->input('mentores');
        $influencer = $request->input('influencer');

        foreach ($chats as $chat) {
            if ($chat->user_one_id == $user->id) {
                $tempUser = $chat->userTwo;
            } else {
                $tempUser = $chat->userOne;
            }
            if ($tempUser->perfil == 'admin') {
                $usuarios[] = $tempUser;
            }
            if ($tempUser->perfil == 'startup' && $startup && $startup == 'yes') {
                $usuarios[] = $tempUser;
            }
            if ($user->perfil == 'startup' || $user->perfil == 'admin') {
                if ($tempUser->perfil == 'firma' && $firma && $firma == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'inversionista' && $inversionista && $inversionista == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'expertos' && $expertos && $expertos == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'mentores' && $mentores && $mentores == 'yes') {
                    $usuarios[] = $tempUser;
                }
                if ($tempUser->perfil == 'influencer' && $influencer && $influencer == 'yes') {
                    $usuarios[] = $tempUser;
                }
            }
        }
        return response()->json(['conexiones' => $usuarios]);
    }

    public function getConexiones(Request $request)
    {
        $user = auth()->user();
        $perfil = $request->input('perfil');
        $usuarios = User::where('id', '!=', $user->id)->where('perfil', $perfil);
        $pais = $request->input('pais');
        $industria_id = $request->input('industria_id');
        $ventas = $request->input('ventas');
        $capital_institucional = $request->input('capital_institucional');
        $prestamo_financiero = $request->input('prestamo_financiero');
        $equipo = $request->input('equipo');
        $experiencia = $request->input('experiencia');
        $experticia = $request->input('experticy');
        $fundador = $request->input('fundador');
        $seguidores = $request->input('seguidores');
        $tipo_capital = $request->input('tipo_capital')??[];
        $formacion = $request->input('formacion')??[];
        $social_platform = $request->input('social_platform')??[];
        if ($pais!= 'Todos') {
            $usuarios = $usuarios->where('pais', $pais);
        }
        if ($perfil == 'startup') {
            if ($ventas != '') {
                $usuarios = $usuarios->where('ventas', $ventas);
            }
            if ($equipo != '') {
                $usuarios = $usuarios->where('equipo', $equipo);
            }
            if ($capital_institucional != '') {
                $usuarios = $usuarios->where('capital_institucional', $capital_institucional);
            }
            if ($prestamo_financiero != '') {
                $usuarios = $usuarios->where('prestamo_financiero', $prestamo_financiero);
            }
        }
        if ($perfil == 'mentores' || $perfil == 'expertos') {
            if ($experiencia != '') {
                $usuarios = $usuarios->where('experiencia', $experiencia);
            }
            if ($fundador != '') {
                $usuarios = $usuarios->where('fundador', $fundador);
            }
        }
        if ($perfil == 'influencer') {
            if ($seguidores != '') {
                $usuarios = $usuarios->where('seguidores', '>', $seguidores);
            }
        }
        if ($perfil == 'startup' || $perfil == 'influencer' || $perfil == 'expertos') {
            if ($industria_id != 'Todas') {
                $usuarios = $usuarios->where('industria_id', '>', $industria_id);
            }   
        }
        $usuarios = $usuarios->get();
        if ($perfil == 'firma') {
            if (count($tipo_capital) > 0) {
                foreach ($usuarios as $key => $usuario) {
                    $ok = false;
                    foreach ($tipo_capital as $value) {
                        if ($usuario->tipo_capital & $value) {
                            $ok = true;
                            break;
                        }
                    }
                    if (!$ok) {
                        unset($usuarios[$key]);
                    }
                }
            }
        }
         if ($perfil == 'influencer') {
            if (count($social_platform) > 0) {
                foreach ($usuarios as $key => $usuario) {
                    $ok = false;
                    foreach ($social_platform as $value) {
                        if ($usuario->social_platform & $value) {
                            $ok = true;
                            break;
                        }
                    }
                    if (!$ok) {
                        unset($usuarios[$key]);
                    }
                }
            }
        }
        if ($perfil == 'inversionista') {
            if (count($formacion) > 0) {
                foreach ($usuarios as $key => $usuario) {
                    $ok = false;
                    foreach ($formacion as $value) {
                        if (!($usuario->formacion & $value)) {
                            $ok = true;
                            break;
                        }
                    }
                    if (!$ok) {
                        unset($usuarios[$key]);
                    }
                }
            }
        }
        return response()->json(['conexiones' => $usuarios]);
    }

    public function information(StoreUserInformationRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();
        $data['tipo_capital'] = 0;
        foreach ($request->input('tipo_capital')??[] as $key => $value) {
            $data['tipo_capital'] += $value;
        }
        $data['formacion'] = 0;
        foreach ($request->input('formacion')??[] as $key => $value) {
            $data['formacion'] += $value;
        }
        $data['social_platform'] = 0;
        foreach ($request->input('social_platform')??[] as $key => $value) {
            $data['social_platform'] += $value;
        }
        $user->fill($data)->save();
        return response()->json([
            'message' => 'Los datos se han modificado correctamente'
        ]);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        $industrias = [];
        foreach (Industria::orderBy('nombre')->get() as $industria) {
            $industrias[$industria->id] = $industria->nombre;
        }
        return view('template.panel.user.show', ['user' => $user, 'industrias' => $industrias]);
    }

    public function shperfil(User $user) {

        $this->authorize('view', $user);
        $industrias = [];
        foreach (Industria::orderBy('nombre')->get() as $industria) {
            $industrias[$industria->id] = $industria->nombre;
        }
        return view('template.panel.user.shperfil', ['user' => $user, 'industrias' => $industrias]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->validated();

/*         if ($data['email'] != $user->email) {
            $email = User::where('email', $data['email']);
            if ($email) {
                return response()->json([
                    'message' => 'Ese email ya esta en uso'
                ], 403);
            }
        } */

        $data['email'] = $request->input('email');
        
        $file = $request->file('avatar');
        if ($file && $request->input('logo') == 'personalizado') {
            if ($file) {
                $filename = 'avatar_' . (User::count() + 1) . '_' . time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs(
                    'avatar',
                    $file,
                    $filename
                );
                $data['avatar'] = 'storage/avatar/'.$filename;
            }
        } else if ($request->input('logo') == 'hombre') {
            $data['avatar'] = 'assets/media/avatars/avatar-1.jpg';
        } else if ($request->input('logo') == 'mujer') {
            $data['avatar'] = 'assets/media/avatars/avatar-2.jpg';
        } else if ($request->input('logo') == 'vacio') {
            $data['avatar'] = 'assets/media/avatars/blank.png';
        }

        $user->fill($data)->save();
        return response()->json([
            'message' => 'Los datos se han modificado correctamente',
            'url' => route('user.show', ['user' => $user->id])
        ]);
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

    public function cursos()
    {
        return view('template.panel.cursos.mine');
    }

    public function buscarCursos()
    {
        return view('template.panel.cursos.search');
    }

    public function alianzas()
    {
        return view('template.panel.alianzas.search');
    }

    public function conexiones()
    {
        $industrias = [];
        foreach (Industria::orderBy('nombre')->get() as $industria) {
            $industrias[$industria->id] = $industria->nombre;
        }
        return view('template.panel.conexiones.search', ['industrias' => $industrias]);
    }

    public function misConexiones()
    {
        return view('template.panel.conexiones.connect');
    }

    public function misConexionesChat()
    {
        return view('template.panel.conexiones.own');
    }

    
}
