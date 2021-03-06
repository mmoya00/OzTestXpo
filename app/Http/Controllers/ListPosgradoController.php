<?php

namespace App\Http\Controllers;

use App\BannerCategory;
use App\Province;
use App\Country;
use App\PosgradeCourseSeminar;
use Illuminate\Http\Request;

class ListPosgradoController extends Controller
{
    public function __invoke(Request $request) {
        //dd($request->get('search_province')."-".$request->get('search_city'));
        $posgrades = PosgradeCourseSeminar::where('activo', '=', 1)
            ->orWhere('tipo', '=', 'Masterado')
            ->orWhere('tipo', '=', 'Doctorado')
            ->orWhere('tipo', '=', 'PHD')
            ->select('id','plan','nombre','institucion','nombre_corto','slug','province_id','city_id','user_id','country_id',
                'objetivo','duracion','fecha_inicio','costo','presencial','semipresencial','distancia',
                'telefono','celular','email','facebook','twitter')
            ->scopes($this->getRouteScope($request))
            ->orderBy('plan')
            ->orderBy('nombre')
            ->paginate(14);

        $bannerData = BannerCategory::where('category_id','=','5')
            ->select('id','photo1_url','photo2_url','photo3_url','photo4_url','photo5_url')
            ->get();

        $countries = Country::all(['printable_name','id']);
        $provinces = Province::all(['name','id']);
        return view('vendor.adminlte.layouts.posgrado', compact('posgrades','provinces', 'bannerData', 'countries'));
    }

    protected function getRouteScope(Request $request) {
        $scopes = [];
        if(!is_null($request->get('search_country')))
            $scopes = array_add($scopes, 'country', $request->get('search_country'));
        if(!is_null($request->get('search_province')))
            $scopes = array_add($scopes, 'province', $request->get('search_province'));
        if(!is_null($request->get('search_city')))
            $scopes = array_add($scopes, 'city', $request->get('search_city'));
        if(!is_null($request->get('search_keywordtopic')))
            $scopes = array_add($scopes, 'keywordtopic', $request->get('search_keywordtopic'));
        if(!is_null($request->get('advsearch_chkPresencial')))
            $scopes = array_add($scopes, 'presencial', $request->get('advsearch_chkPresencial'));
        if(!is_null($request->get('advsearch_chkSemipresencial')))
            $scopes = array_add($scopes, 'semipresencial', $request->get('advsearch_chkSemipresencial'));
        if(!is_null($request->get('advsearch_chkDistancia')))
            $scopes = array_add($scopes, 'distancia', $request->get('advsearch_chkDistancia'));
        if(!is_null($request->get('search_institucion')))
            $scopes = array_add($scopes, 'institucion', $request->get('search_institucion'));
        if(!is_null($request->get('search_tipo')))
            $scopes = array_add($scopes, 'tipo', $request->get('search_tipo'));
        if(!is_null($request->get('advsearch_costo'))) {
            $scopes = array_add($scopes, 'costo_promedio_posgrados', $request->get('advsearch_costo'));
        }

        return isset($scopes) ? $scopes : [];
        //return [];
    }
}
