<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres', 'apellidos', 'telefono', 'licencia_medica', 'especialidad', 'user_id'
    ];

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    public function Horarios(){
        return $this->hasMany(Horario::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function events(){
        return $this->belongsTo(Event::class);
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }
    public function pagos(){
        return $this->hasMany(Pago::class);
    }
}
