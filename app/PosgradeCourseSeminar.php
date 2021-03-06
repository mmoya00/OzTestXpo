<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PosgradeCourseSeminar extends Model
{
    protected $fillable = [
        'nombre',
        'activo',
        'plan',
        'palabras_clave',
        'nombre_corto',
        'clasificacion',
        'tipo',
        'campo',
        'institucion',
        'costo',
        'instructores',
        'telefono',
        'celular',
        'email',
        'web',
        'facebook',
        'twitter',
        'linkedin',
        'presencial',
        'semipresencial',
        'distancia',
        'cupos',
        'fecha_inicio',
        'fecha_fin',
        'duracion',
        'hora_ingreso',
        'hora_salida',
        'lugar',
        'objetivo',
        'temario',
        'instructores_detalle',
        'incluye',
        'mapa_url',
        'documento_pdf1',
        'documento_pdf2',
        'documento_pdf3',
        'otros_posgrados_cursos',

        'max_alumnos_x_nivel',
        'meses_inicio',
        'duracion_nivel',
        'horarios',

        'ruc_invoice',
        'razon_social_invoice',
        'email_invoice',
        'telefono_invoice',
        'direccion_invoice',
        'plan_desde',
        'plan_hasta',
        'country_id',
        'province_id',
        'city_id',
        'user_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNombreAttribute($value) {
        $this->attributes['nombre'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('posgrado.show', [$this->id, $this->slug]);
    }

    public function scopeCountry($query, $country_id)
    {
        return $query->where('country_id', $country_id);
    }

    public function scopeProvince($query, $province_id)
    {
        return $query->where('province_id', $province_id);
    }

    public function scopeCity($query, $city_id)
    {
        return $query->where('city_id', $city_id);
    }

    public function scopeKeywordtopic($query, $name)
    {
        return $query->where('nombre', 'LIKE', "%$name%")->orWhere('palabras_clave', 'LIKE', "%$name%");
    }

    public function scopePresencial($query, $presencial)
    {
        return $query->orWhere('presencial', 1);
    }

    public function scopeSemipresencial($query, $semipresencial)
    {
        return $query->orWhere('semipresencial', 1);
    }

    public function scopeDistancia($query, $distancia)
    {
        return $query->orWhere('distancia', 1);
    }

    public function scopeInstitucion($query, $institucion)
    {
        return $query->orWhere('institucion', $institucion);
    }

    public function scopeCosto_promedio_posgrados($query, $costo)
    {
        $costoP = explode(',', $costo);

        if ($costoP[0] == '0' and $costoP[1] == '11000')
            return $query->where('costo', '<', 11000)->orWhereNull('costo');
        if ($costoP[0] == '11000' and $costoP[1] == '11000')
            return $query->where('costo', '>', $costoP[1]);
        return $query->whereBetween('costo', $costoP);
    }

    public function scopeCosto_promedio_cursos($query, $costo)
    {
        $costoP = explode(',', $costo);

        if ($costoP[0] == '0' and $costoP[1] == '600')
            return $query->where('costo', '<', 600)->orWhereNull('costo');
        if ($costoP[0] == '600' and $costoP[1] == '600')
            return $query->where('costo', '>', $costoP[1]);
        return $query->whereBetween('costo', $costoP);
    }
}
