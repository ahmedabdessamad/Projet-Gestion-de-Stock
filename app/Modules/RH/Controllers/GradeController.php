<?php

namespace App\Modules\RH\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modules\RH\Models\Grade;
use App\Modules\RH\Models\Employee;
use DB;
use Alert;
use Illuminate\Support\Facades\Input;


class GradeController extends Controller
{
	/**
	* Show list grades
	*/
	public function listGrade()
	{
		return view('RH::grade.list', ['grades' => Grade::all()]);
	}

	

	/**
	* Store new grade
	*/
	public function handleAddgrade()
	{
			 $data = Input::all();
       $rules = [
           'label' => 'required',
           'min_salary' => 'required',
           "max_salary" => "required",         
       ];
       $messages = [
        'label.required' => 'étiquette est obligatoire',
        'min_salary.required' => 'salaire minimumu est obligatoire',
        'max_salary.required' => 'salaire maximum est obligatoire',
       ];
   
       $validation = Validator::make($data, $rules, $messages);
   
       if ($validation->fails()) {
           return redirect()->back()->withErrors($validation->errors());
       } else {
     

        $gradeData = [
           'label' => $data['label'],
           'min_salary' => $data['min_salary'],
           'max_salary' => $data['max_salary'],
       ];
       $grade_id = Grade::create($gradeData)->id;
              Alert::success('Bien !', 'Grade ajouté avec succés !')->persistent('Fermer');
       return back();
       }
	}


  /**
  * handle edit grade
  */ 
  public function handleEditGrade()
  {
     $data = Input::all();
       $rules = [
           'label' => 'required',
           'min_salary' => 'required',
           "max_salary" => "required",         
       ];
       $messages = [
        'label.required' => 'étiquette est obligatoire',
        'min_salary.required' => 'salaire minimumu est obligatoire',
        'max_salary.required' => 'salaire maximum est obligatoire',
       ];
   
       $validation = Validator::make($data, $rules, $messages);
   
       if ($validation->fails()) {
           return redirect()->back()->withErrors($validation->errors());
       } else {
       $grade = Grade::find($data['id']);
           $grade->label = $data['label'];
           $grade->min_salary = $data['min_salary'];
           $grade->max_salary = $data['max_salary'];
        $grade->save();
      // $grade_id = Grade::create($gradeData)->id;
              Alert::success('Bien !', 'Grade mis a jour avec succés !')->persistent('Fermer');
       return back();
       }
  }

  /**
  * delete grade
  */
  public function handleDeletGrade()
  {
      $data = Input::all();

       $dep = Grade::find($data['id']);
       $employee = Employee::where('grade_id', $data['id'])->first();
       if($employee){
          Alert::error('Désolé, cette opération ne peut pas être effectuée car un ou plusieurs employés y appartiennent.','Erreur')->persistent('Ok');
           return back(); 
       }
       else if($dep){
          $dep->delete();
       }
       else{
           Alert::error('Veuillez vérifier le grade selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('Grade Supprimé avec succès','Succés')->persistent('Ok');
       return back();
  }

  /**
  * API store new grade
  */ 
  public function apiHandleAddGrade(Request $request)
  {
     $input = $request->all();
     Grade::create([
       'label' => $input['label'],
       'min_salary' => $input['min_salary'],
       'max_salary' => $input['max_salary']
     ]);
    return response()->json(['success'=>'1']);
  }
}
