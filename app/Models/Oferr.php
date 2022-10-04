<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferr extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','chat_UserId','precio_oferta','descripcion_proyecto','plazo_proyecto','estado'];
}
