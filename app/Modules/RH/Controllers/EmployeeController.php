<?php

namespace App\Modules\RH\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modules\RH\Models\Employee;
use App\Modules\User\Models\User;
use App\Modules\RH\Models\Department;
use App\Modules\RH\Models\Grade;
use DB;
use Alert;
use Illuminate\Support\Facades\Input;


class EmployeeController extends Controller
{
	/**
	* Show employee list
	*/
	public function listEmployee()
	{

    $users = Employee::all();
    //dd($users);
		return view('RH::employee.list', ['users' => $users]);
	}

	/**
	* show add form employee
	*/ 
	public function showAddEmployee()
	{
      return view('RH::employee.add');
	}

	/**
	* Strore new employee
	*/
	public function handleAddEmployee()
	{
		 $data = Input::all();


       $rules = [
           'first_name' => 'required',
           'last_name' => 'required',
           "email" => "required|email|unique:users",  
           'grade_id' => 'required',
           'department_id' => 'required'       
       ];
   
       $messages = [
        'email.required' => 'Email est obligatoire',
        'email.email' => 'Doit etre un valide email',
        'email.unique' => 'Email déja utilisé',
        'first_name.required' => 'prénom est obligatoire',
        'last_name.required' => 'nom est obligatoire',
        'grade_id.required' => 'Qualité est obligatoire',
        'department_id.required' => 'Département est obligatoire'   
       ];
   
       $validation = Validator::make($data, $rules, $messages);
   
       if ($validation->fails()) {
           return redirect()->back()->withErrors($validation->errors());
         }
  
        if(isset($data['image'])) {
            $file = $data['image'];
            $imagePath = 'storages/images/employee/';
            $filename = 'avatar' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image =  $filename;
        }else {
            $filename = 'default.png';
        }
        $bytes = openssl_random_pseudo_bytes(2);
        $password = bin2hex($bytes);

        $userData = [
           'first_name' => $data['first_name'],
           'last_name' => $data['last_name'],
           'email' => $data['email'],
           'birthday' => date('Y-m-d', strtotime($data['birthday'])),
           'phone' => $data['phone'],
           'image' => $filename,
           'password' => $password,
           'status' => 1
       ];
      $user = User::create($userData);

    $employee =[
    	     'salary' => $data['salary'],
           'function' => $data['function'],
           'contract_type' => $data['contract_type'],
           'grade_id' => $data['grade_id'],
           'department_id' => $data['department_id'],
           'eng_date' => date('Y-m-d', strtotime($data['eng_date'])),
           'user_id' => $user->id
    	];
    Employee::create($employee);
   
       Alert::success('Bien !', 'Utilisateur ajouté avec succés !')->persistent('Fermer');
       return back();
	}


  /**
  * Show edit employee
  */ 
  public function showEditEmployee($id)
  {
    $user = User::findOrFail($id);
    //dd($employee);die();
    return view('RH::employee.edit', ['user' => $user]);
  }

  /**
  * update one employee
  */
  public function handleEditEmployee()
  {
      $data = Input::all();
      $user = User::find($data['id']);
      $employee = Employee::find($user->employee->id);
       $rules = [
           'first_name' => 'required',
           'last_name' => 'required',
           "email" => "required|email|unique:users". ',id,' . $data['id'],
           'grade_id' => 'required',
           'department_id' => 'required' 
       ];
   
       $messages = [
        'email.required' => 'Email est obligatoire',
        'email.email' => 'Doit etre un valide email',
        'email.unique' => 'Email déja utilisé',
        'first_name.required' => 'prénom est obligatoire',
        'last_name.required' => 'nom est obligatoire',
        'grade_id.required' => 'Qualité est obligatoire',
        'department_id.required' => 'département est obligatoire'
       ];
   
       $validation = Validator::make($data, $rules, $messages);
   
       if ($validation->fails()) {
           return redirect()->back()->withErrors($validation->errors());
         }
  
        if(isset($data['image'])) {
            $file = $data['image'];
            $imagePath = 'storage/images/employee/';
            $filename = 'avatar' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image =  $filename;
        }else {
            $filename = 'default.png';
        }
        $bytes = openssl_random_pseudo_bytes(2);
        $password = bin2hex($bytes);

        $user->update([
           'first_name' => $data['first_name'],
           'last_name' => $data['last_name'],
           'email' => $data['email'],
           'birthday' => date('Y-m-d', strtotime($data['birthday'])),
           'phone' => $data['phone'],
           'image' => $filename,
           'password' => $password,
           'status' => 1
       ]);
      //$user = User::create($userData);

      $employee->update([
           'salary' => $data['salary'],
           'function' => $data['function'],
           'contract_type' => $data['contract_type'],
           'grade_id' => $data['grade_id'],
           'department_id' => $data['department_id'],
           'eng_date' => date('Y-m-d', strtotime($data['eng_date'])),
           'user_id' => $user->id
      ]);
    //Employee::create($company);
   
       Alert::success('Bien !', 'employee modifiée  avec succés !')->persistent('Fermer');
       return back();
  }

  /**
  * return json
  * get departement
  */
  public function getEmployeeDepartement()
  {
      return response()->json(['deps' => Department::all()]);
  }

  /**
  * return json
  * get grade
  */
  public function getEmployeeGrade()
  {
      return response()->json(['grades' => Grade::all()]);
  }

  /**
  * API change employee status
  */
  public function apiChangeEmloyeeStatus(Request $request)
  {
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

      public function handleDeleteEmployee(){

        $data = Input::all();

        $user = User::find($data['id']);
        if($user){
            $user->employee->delete();
            $user->delete();
        }
        else{
            Alert::error('Veuillez vérifier l\'employée selectionné','Erreur')->persistent('Ok');
            return back();
        }
        Alert::success('Employée Supprimé avec succès','Succés')->persistent('Ok');
        return back();
    }

}