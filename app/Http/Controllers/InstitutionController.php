<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Institution,Province,Canton,Parish,City,Sector};
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    public function createPreescolar() {
        $provinces = Province::all(['name','id']);
        return view('institutions.createpreescolar', compact('provinces'));
    }

    public function edit($id) {
        $institution = Institution::findOrFail($id);
        $provinces = Province::all(['name','id']);
        $cantons = Canton::where('province_id','=',$institution->province_id)
                    ->select('name','id')->get();
        $parishes = Parish::where('canton_id','=',$institution->canton_id)
                    ->select('name','id')->get();
        $cities = City::where('province_id','=',$institution->province_id)
                    ->select('name','id')->get();
        $sectors = Sector::where('city_id','=',$institution->city_id)
                    ->select('nombre','id')->get();

        return view('institutions.editinstitution',
            compact('provinces','cantons','parishes','cities','sectors'))->withInstitution($institution);
    }

    public function update($id, Request $request) {
        $institution = Institution::findOrFail($id);

        $this->validate($request, [
            'nombre' => 'required',
            'institution_bg_picture' => 'image|mimes:jpeg,bmp,png|max:500'
        ]);

        $input = $request->all();
        $institution->fill($input);

        if(isset($request->institution_bg_picture)) {
            $fileName = $request->institution_bg_picture->store('public/institution_bg');
            $institution->institution_bg_picture = Storage::url($fileName);
        }
        if(isset($request->institution_picture_1)) {
            $fileName = $request->institution_picture_1->store('public/institution_pic');
            $institution->institution_picture_1 = Storage::url($fileName);
        }
        if(isset($request->institution_picture_2)) {
            $fileName = $request->institution_picture_2->store('public/institution_pic');
            $institution->institution_picture_2 = Storage::url($fileName);
        }
        if(isset($request->institution_picture_3)) {
            $fileName = $request->institution_picture_3->store('public/institution_pic');
            $institution->institution_picture_3 = Storage::url($fileName);
        }
        if(isset($request->institution_picture_4)) {
            $fileName = $request->institution_picture_4->store('public/institution_pic');
            $institution->institution_picture_4 = Storage::url($fileName);
        }
        if(isset($request->institution_picture_5)) {
            $fileName = $request->institution_picture_5->store('public/institution_pic');
            $institution->institution_picture_5 = Storage::url($fileName);
        }
        if(isset($request->institution_picture_6)) {
            $fileName = $request->institution_picture_6->store('public/institution_pic');
            $institution->institution_picture_6 = Storage::url($fileName);
        }
        if(isset($request->banner_inst_picture_1)) {
            $fileName = $request->banner_inst_picture_1->store('public/institution_ban');
            $institution->banner_inst_picture_1 = Storage::url($fileName);
        }
        if(isset($request->banner_inst_picture_2)) {
            $fileName = $request->banner_inst_picture_2->store('public/institution_ban');
            $institution->banner_inst_picture_2 = Storage::url($fileName);
        }
        if(isset($request->banner_inst_picture_3)) {
            $fileName = $request->banner_inst_picture_3->store('public/institution_ban');
            $institution->banner_inst_picture_3 = Storage::url($fileName);
        }
        if(isset($request->banner_inst_picture_4)) {
            $fileName = $request->banner_inst_picture_4->store('public/institution_ban');
            $institution->banner_inst_picture_3 = Storage::url($fileName);
        }
        if(isset($request->banner_inst_picture_5)) {
            $fileName = $request->banner_inst_picture_5->store('public/institution_ban');
            $institution->banner_inst_picture_5 = Storage::url($fileName);
        }
        $institution->save();

        Session::flash('flash_message', 'Registro actualizado correctamente.');

        return redirect()->back();
    }
}
