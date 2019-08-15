<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Alert;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Modules\User\Models\User;


class UserController extends Controller
{

    public function showResponsibleDashboard(){
        return view('User::responsible.dashboard');

    }

    public function showAdminDashboard(){
        return view('User::admin.dashboard');
    }
      public function showEmployeeDashboard(){
        return view('User::employee.dashboard');
    }


    public function showUserLogin(){
        if( $user=Auth::user() ){
            Alert::warning('Attention', 'Vous êtes déjà connecté!')->persistent('Fermer');
            if(checkAdministratorRole($user)){
                return redirect()->route('showAdminDashboard');
            }
            if(checkResponsibleRole($user)){
                return redirect()->route('showResponsibleDashboard');
            }
        
            Auth::logout();
        }
        return view("User::auth.login");
    }


  public function showAdminLogin(){
        if($user=Auth::user()){
            Alert::warning('Attention', 'Vous êtes déjà connecté!')->persistent('Fermer');
            if(checkAdministratorRole($user)){
                return redirect()->route('showAdminDashboard');
            }
            Alert::warning('Attention', 'Vous ne pouvez pas accéder à cette partie!')->persistent('Fermer');
            return redirect()->back();
        }
        return view("User::auth.adminLogin");
    }

 
    public function handleUserLogin(Request $request){

        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user);
            if ($user->status === 1) {
                if(checkAdministratorRole($user)){
                    return redirect()->route('showAdminDashboard');
                }
                if(checkResponsibleRole($user)){
                    return redirect()->route('showResponsibleDashboard');
                }
                if(checkEmployeeRole($user)){
                    return redirect()->route('showEmployeeDashboard');
                }
        
            }
            else{
                Auth::logout();
                Alert::error('Oops', 'Compte non vérifié!')->persistent('Fermer');
                return route('showUserLogin');
            }
        }
        Alert::error('Oops', 'Vérifiez Les données saisie!')->persistent('Fermer');
        return back();
    }

     public function handleLogout(){
        Auth::logout();
        Alert::success('Succés', 'Vous êtes déconnecté!')->persistent('Fermer');
        return redirect()->route('showUserLogin');
    }


    public function showUsers(){
        return view('User::users.list',[
            'users' => User::all()
        ]);
    }

    public function showAddUser(){
        return view('User::users.add');
    }

    public function showEditUser(){
        return view('User::users.edit');
    }


    public function handleAddUser(){
        $data = Input::all();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ];

        $messages = [
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Doit etre un valide email',
            'email.unique' => 'Email déja utilisé',
            'first_name.required' => 'Nom utilisateur est obligatoire',
            'last_name.required' => 'Prénom utilisateur est obligatoire',
            'password.required' => 'Saisi une mot de passe',
            'role.required' => 'Role est obligatoire'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        if($data['image']) {
            $file = $data['image'];
            $imagePath = 'storages/images/user/';
            $filename = 'avatar' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image = $imagePath . '' . $filename;
        }

        $userData = [
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'] ? $data['status'] : 0,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'] ? $data['phone'] : null,
            'image' => $image ? $image : null
        ];

        $user = User::create($userData);

        $user->assignRole((int)$data['role']);

        Alert::success('Bien !', 'Utilisateur ajouté avec succés !')->persistent('Fermer');
        return back();
    }

    public function handleEditUser(){

        $data = Input::all();

        $user = User::find($data['id']);
        if(!$user){
            Alert::error('Erreur', 'Utilisateur non trouvé')->persistent('Fermer');
            return back();
        }

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ];

        $messages = [
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Doit etre un valide email',
            'email.unique' => 'Email déja utilisé',
            'first_name.required' => 'Nom utilisateur est obligatoire',
            'last_name.required' => 'Prénom utilisateur est obligatoire',
            'password.required' => 'Saisi une mot de passe',
            'role.required' => 'Role est obligatoire'

        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        if($data['image']) {
            $file = $data['image'];
            $imagePath = 'storages/images/users/';
            $filename = 'avatar' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image = $imagePath . '' . $filename;
        }

        $user->update([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'] ? $data['status'] : 0,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'] ? $data['phone'] : null,
            'image' => $image ? $image : null
        ]);

        $user->assignRole($data['role']);

        Alert::success('Bien !', 'Utilisateur modifier avec succés !')->persistent('Fermer');
        return back();
    }

    public function handleDeleteUser(){

        $data = Input::all();

        $user = User::find($data['id']);
        if($user){
            $user->delete();
        }
        else{
            Alert::error('Veuillez vérifier l\'utilisateur selectionné','Erreur')->persistent('Ok');
            return back();
        }
        Alert::success('Utilisateurer Supprimé avec succès','Succés')->persistent('Ok');
        return back();
    }

    public function apiGetRoles(){

        return response()->json(['roles' => Role::all()]);
    }

    public function apiChangeUserStatus(Request $request){

        $id = $request->get('userId');
        $user = User::find($id);

        if(!$user){
            return response()->json(['status' => 404]);
        }

        if($user->status == 1){
            $user->status = 0;
            $user->save();
        }else {
            $user->status = 1;
            $user->save();
        }

        return response()->json(['status' => 200]);
    }

}
