<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Institution;
use App\{City,Canton,Parish,Sector};
use Illuminate\Support\Facades\Input;

Route::get('/', ['uses' => 'Home2Controller@showHome', 'as' => 'destacados',]);

Route::get('preescolar', [
    'uses' => 'ListPreescolarController',
    'as' => 'preescolar.all',
]);

Route::get('escuela_colegio', [
    'uses' => 'ListEscuelaColegioController',
    'as' => 'escuela_colegio.all',
]);

Route::get('superior', [
    'uses' => 'ListSuperiorController',
    'as' => 'superior.all',
]);

Route::get('posgrado', [
    'uses' => 'ListPosgradoController',
    'as' => 'posgrado.all',
]);

Route::get('cursos_seminarios', [
    'uses' => 'ListCursoSeminarioController',
    'as' => 'cursos_seminarios.all',
]);

Route::get('eventos', [
    'uses' => 'ListEventosController',
    'as' => 'eventos.all',
]);

Route::get('planes', [
    'uses' => 'ListPlanesController@listPlanes',
    'as' => 'planes.all',
]);

Route::get('preescolar/{institution}-{slug}', [
    'uses' => 'ShowInstitutionController',
    'as' => 'preescolar.show',
])->where('institution', '\d+');

Route::get('escuelacolegio/{institution}-{slug}', [
    'uses' => 'ShowEscuelaColegioController',
    'as' => 'escuelacolegio.show',
])->where('institution', '\d+');

Route::get('superior/{pregrade}-{slug}', [
    'uses' => 'ShowSuperiorController',
    'as' => 'superior.show',
])->where('pregrade', '\d+');

Route::get('posgrado/{posgrado}-{slug}', [
    'uses' => 'ShowPosgradeController',
    'as' => 'posgrado.show',
])->where('posgrado', '\d+');

Route::get('cursoseminario/{cursoseminario}-{slug}', [
    'uses' => 'ShowCourseSeminarController',
    'as' => 'cursoseminario.show',
])->where('cursoseminario', '\d+');

Route::get('evento/{event}-{slug}', [
    'uses' => 'ShowEventController',
    'as' => 'evento.show',
])->where('event', '\d+');

Route::get('ajax-city/', function() {
   $province_id = Input::get('province_id');

   $cities = City::where('province_id', '=', $province_id)->orderBy('name')->get();

   return $cities;
});

Route::get('ajax-sector/', function() {
    $city_id = Input::get('city_id');

    $sectors = Sector::where('city_id', '=', $city_id)->orderBy('nombre')->get();
    if(!count($sectors) > 0) {
        $sectors = Sector::where('city_id', '=', null)->orderBy('nombre')->get();
    }

    return $sectors;
});

Route::get('ajax-canton/', function() {
    $province_id = Input::get('province_id');

    $cantons = Canton::where('province_id', '=', $province_id)->orderBy('name')->get();

    return $cantons;
});

Route::get('ajax-parish/', function() {
    $canton_id = Input::get('canton_id');

    $parishes = Parish::where('canton_id', '=', $canton_id)->orderBy('name')->get();

    return $parishes;
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('institutions', [
        'uses' => 'HomeController@getInstitutionsByAuthUser',
        'as' => 'institutions.all',
    ]);
    //Routes Preescolar
    Route::get('preescolar/add', [
        'uses' => 'InstitutionController@createPreescolar',
        'as' => 'preescolar.create',
    ]);
    Route::get('preescolar/{institution}/edit', [
        'uses' => 'InstitutionController@edit',
        'as' => 'preescolar.edit',
    ]);
    Route::post('preescolar/{institution}/edit', [
        'uses' => 'InstitutionController@update',
        'as' => 'preescolar.update',
    ]);
    Route::post('preescolar/store', [
        'uses' => 'InstitutionController@store',
        'as' => 'preescolar.store',
    ]);

    //Routes Escuela/Colegio
    Route::get('escuelacolegio/add', [
        'uses' => 'InstitutionController@createEscuelacolegio',
        'as' => 'escuelacolegio.create',
    ]);
    Route::get('escuelacolegio/{institution}/edit', [
        'uses' => 'InstitutionController@editEscuelacolegio',
        'as' => 'escuelacolegio.edit',
    ]);
    Route::post('escuelacolegio/{institution}/edit', [
        'uses' => 'InstitutionController@updateEscuelacolegio',
        'as' => 'escuelacolegio.update',
    ]);
    Route::post('escuelacolegio/store', [
        'uses' => 'InstitutionController@storeEsuelacolegio',
        'as' => 'escuelacolegio.store',
    ]);

    //Routes Superior
    Route::get('superior/add', [
        'uses' => 'SuperiorController@create',
        'as' => 'superior.create',
    ]);
    Route::get('superior/{pregrade}/edit', [
        'uses' => 'SuperiorController@edit',
        'as' => 'superior.edit',
    ]);
    Route::post('superior/{pregrade}/edit', [
        'uses' => 'SuperiorController@update',
        'as' => 'superior.update',
    ]);
    Route::post('superior/store', [
        'uses' => 'SuperiorController@store',
        'as' => 'superior.store',
    ]);

    //Routes Posgrados
    Route::get('posgrados/add', [
        'uses' => 'PosgradosController@create',
        'as' => 'posgrados.create',
    ]);
    Route::get('posgrados/{posgrado}/edit', [
        'uses' => 'PosgradosController@edit',
        'as' => 'posgrados.edit',
    ]);
    Route::post('posgrados/{posgrado}/edit', [
        'uses' => 'PosgradosController@update',
        'as' => 'posgrados.update',
    ]);
    Route::post('posgrados/store', [
        'uses' => 'PosgradosController@store',
        'as' => 'posgrados.store',
    ]);

    //Routes Cursos/Seminarios
    Route::get('cursoseminario/add', [
        'uses' => 'CourseSeminarController@create',
        'as' => 'cursoseminario.create',
    ]);
    Route::get('cursoseminario/{cursoseminario}/edit', [
        'uses' => 'CourseSeminarController@edit',
        'as' => 'cursoseminario.edit',
    ]);
    Route::post('cursoseminario/{cursoseminario}/edit', [
        'uses' => 'CourseSeminarController@update',
        'as' => 'cursoseminario.update',
    ]);
    Route::post('cursoseminario/store', [
        'uses' => 'CourseSeminarController@store',
        'as' => 'cursoseminario.store',
    ]);

    //Routes Events


    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
