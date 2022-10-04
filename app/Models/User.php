<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['profile', 'asset_img', 'rol', 'ventas_anuales', 'industria_nombre'];

    public function getIndustriaNombreAttribute()
    {
        return $this->industria->nombre??'';
    }

    public function industria()
    {
        return $this->belongsTo(Industria::class);
    }

    public function getRolAttribute()
    {
        return __('categorias.'.$this->perfil);
    }


    public function getImgAttribute()
    {
        if ($this->avatar != '') {
            return $this->avatar;
        }
        return 'assets/media/avatars/blank.png';
    }

    public function getProfileAttribute()
    {
        return route('user.show', [$this->id]);
    }

    public function getAssetImgAttribute()
    {
        if ($this->avatar != '') {
            return asset($this->avatar);
        }
        return asset('assets/media/avatars/blank.png');
    }

    public function getTieneIndustriaAttribute()
    {
        return $this->perfil == 'startup' || $this->perfil == 'expertos' || $this->perfil == 'mentores' || $this->perfil == 'influencer';
    }

    public function getTieneSocialAttribute()
    {
        return $this->twitter != '' || $this->facebook != '' || $this->instagram != '' || $this->linkedin != '' || $this->youtube != '' || $this->web != '' || $this->tiktok != '';
    }

    public function getFormacionTextAttribute()
    {
        return $this->obtenerPow('formacion');
    }
     public function getsocial_platformTextAttribute()
    {
        return $this->obtenerPow('social_platform');
    }

    public function getCapitalAttribute()
    {
        return $this->obtenerPow('tipo_capital');
    }

    protected function obtenerPow($valor)
    {
        $text = '';
        for ($i=0; $i < $this->{$valor}; $i++) { 
            $pow = pow(2, $i);
            if ($this->{$valor} & $pow)
                $text.= __('categorias.'.$valor.'.'.$pow).', ';
        }
        return rtrim(', ', $text);
    }

    public function getSeguidoresTextAttribute()
    {
        if ($this->seguidores && $this->seguidores != '') {
            return __('categorias.seguidores.'.$this->seguidores);
        }
    }

    public function getExperienciaYearsAttribute()
    {
        if ($this->experiencia && $this->experiencia != '') {
            return __('categorias.experiencia.'.$this->experiencia);
        }
    }

    public function getEquipoSizeAttribute()
    {
        if ($this->experiencia && $this->experiencia != '') {
            return __('categorias.equipo.'.$this->experiencia);
        }
    }

    public function getVentasAnualesAttribute()
    {
        if ($this->ventas && $this->ventas != '') {
            return __('categorias.ventas.'.$this->ventas);
        }
    }

    public function chatsSalientes()
    {
        return $this->hasMany(Chat::class, 'user_one_id');
    }

    public function chatsEntrantes()
    {
        return $this->hasMany(Chat::class, 'user_two_id');
    }

    public function getChatsAttribute()
    {
        return $this->chatsEntrantes->merge($this->chatsSalientes)->sortByDesc('created_at');
    }

    public function getConexionesAttribute()
    {
        return $this->chats->count();
    }

    public function getIsAdminAttribute()
    {
        return $this->perfil == 'admin';
    }
    public function getIsExpertosAttribute()
    {
        return $this->perfil == 'expertos';
    }

    public function connectionsSent()
    {
        return $this->hasMany(Connection::class, 'sender');
    }

    public function connectionsReceived()
    {
        return $this->hasMany(Connection::class, 'receiver');
    }

    public function getConexionesPendientesAttribute()
    {
        return $this->connectionsReceived()->with(['senderUser', 'receiverUser'])->where('status', 'pendiente')->get();
    }

    public function getConexionesPendientesTotalAttribute()
    {
        return $this->connectionsSent()->where('status', 'pendiente')->get()->merge($this->connectionsReceived()->where('status', 'pendiente')->get());
    }

    public function getConexionesAceptadasAttribute()
    {
        return $this->connectionsSent()->where('status', 'aceptado')->get()->merge($this->connectionsReceived()->where('status', 'aceptado')->get());
    }

    public function getConexionesRealesAttribute()
    {
        return $this->connectionsSent()->where('status', 'aceptado')->get()->merge($this->connectionsReceived()->where('status', 'aceptado')->get())->count();
    }

    public function tieneConexionPendiente()
    {
        return (Connection::conexiones($this)->where('status', 'pendiente')->first()) ? true : false;
    }

    public function envioConexion($user)
    {
        return ($this->connectionsSent()->where('status', 'pendiente')->where('receiver', $user->id)->first()) ? true : false;
    }

    public function tieneConexionAceptada() {
        return (Connection::conexiones($this)->where('status', 'aceptado')->first()) ? true : false;
    }

    public function getConexionPendienteAttribute()
    {
        return Connection::conexiones($this)->where('status', 'pendiente')->first();
    }

    public function getConexionAceptadaAttribute()
    {
        return Connection::conexiones($this)->where('status', 'pendiente')->first();
    }
}
