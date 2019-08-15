<?php

namespace App\Modules\RH\Controllers;

use App\Modules\User\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Alert;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Modules\User\Models\User;


class ResponsibleController extends Controller
{

  /**
  * Show edit responsible profile
  */
  public function showResponsibleEditProfile(){
        return view('RH::responsible.edit');
  }

  /**
  * handle responsible edit profile
  */
   public function handleResponsibleEditProfile(){

        $data = Input::all();

        $user = User::find($data['id']);
        if(!$user){
            Alert::error('Erreur', 'erreur systéme')->persistent('Fermer');
            return back();
        }

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$data['id'],
        ];

        $messages = [
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Doit etre un valide email',
            'email.unique' => 'Email déja utilisé',
            'first_name.required' => 'Nom utilisateur est obligatoire',
            'last_name.required' => 'Prénom utilisateur est obligatoire',
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }
        if(isset($data['image'])) {
            $file = $data['image'];
            $imagePath = 'storages/images/users/';
            $filename = 'avatar' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image =  $filename;
        }else {
            $image = 'default.png';
        }

        $user->update([
            'email' => $data['email'],
            'birthday' => date('Y-m-d', strtotime($data['birthday'])),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'] ? $data['phone'] : null,
            'image' => $image
        ]);

        Alert::success('Bien !', 'votre profile a été mis a jour avec succés !')->persistent('Fermer');
        return back();
    }

}