<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'nombre',
        'activo',
        'plan',
        'palabras_clave',
        'evento_bg_picture',
        'slug',
        'informacion',
        'costo',
        'fecha_evento',
        'dia_evento',
        'mes_evento',
        'year_evento',
        'hora_evento',
        'direccion',
        'telefono',
        'celular',
        'email',
        'web',
        'facebook',
        'twitter',
        'ruc_invoice',
        'razon_social_invoice',
        'email_invoice',
        'telefono_invoice',
        'direccion_invoice',
        'plan_desde',
        'plan_hasta',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setNombreAttribute($value) {
        $this->attributes['nombre'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('evento.show', [$this->id, $this->slug]);
    }
}
