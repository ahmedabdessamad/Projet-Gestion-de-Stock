<?php

namespace App\Modules\RH\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\RH\Models\Department;
use App\Modules\RH\Models\Holiday;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;
use Carbon\Carbon;

class DepartementController extends Controller
{

   public function showDepartments(){
        return view('RH::departments.res-list',[
        	'departments' => Department::all()]);
    }

   public function handleAddDepartment(){

       $data = Input::all();

       $rules = [
           'label' => 'required',
       ];

       $messages = [
           'label.required' => 'Saisi le nom du departement'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $depData = [
           'label' => $data['label'],
       ];

       Department::create($depData);
       Alert::success('Bien !', 'Departement ajouté avec succés !')->persistent('Fermer');
       return back();

   }

    public function handleEditDepartment(){

       $data = Input::all();

       $dep = Department::find($data['id']);
       if(!$dep){
           Alert::error('Erreur', 'Departement non trouvé')->persistent('Fermer');
           return back();
       }

       $dep->update([
           'label' => $data['label'] ? $data['label'] : $dep->label
       ]);

       Alert::success('Bien !', 'Departement modifier avec succés !')->persistent('Fermer');
       return back();
   }

   public function handleDeleteDepartment(){
       $data = Input::all();

       $dep = Department::find($data['id']);
       if($dep){
           $dep->delete();
       }
       else{
           Alert::error('Veuillez vérifier le departement selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('departement Supprimé avec succès','Succés')->persistent('Ok');
       return back();
   }

   
   /**
   * API add departement
   */
   public function apiHandleAddDepartment(Request $request)
   {
     $input = $request->all();
     Department::create([
       'label' => $input['label']
     ]);
    return response()->json(['success'=>'1']); 
    } 
      public function showHolidays(){
        return view('RH::holidays.list',[
        	'holidays' => Holiday::all()]);
    }

   public function handleAddHoliday(){

        $data = Input::all();

       $rules = [
          'date' => 'required|date',
          'label' => 'required',
          'type' => 'required'
       ];

       $messages = [
           'date.required' => 'Saisi la date du jour',
            'date.date' => 'Doit etre un date valide',
             'label.required' => 'Saisi le nom du jour',
              'type.required' => 'Saisi le type du jour'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $dataDate =$data['date'];
       $dates[] = explode('-', $dataDate);
       $date = $dates[0][0].'-'.$dates[0][1].'-'.$dates[0][2].' 00:00:00';

       $dayData = [
           'date' => $date,
           'label' => $data['label'],
           'type' => $data['type'],
           'recoverable' => Input::has('recoverable') ? 1 : 0
       ];

       Holiday::create($dayData);
       Alert::success('Bien !', 'Jour firieé ajouté avec succés !')->persistent('Fermer');
       return back();

   }

    public function handleEditHoliday(){

       $data = Input::all();

       $day = Holiday::find($data['id']);
       if(!$day){
           Alert::error('Erreur', 'Jour non trouvé')->persistent('Fermer');
           return back();
       }

     //  dd($data['date']);

       if($data['date']){
        $dataDate =$data['date'];
        $dates[] = explode('-', $dataDate);
        $date = $dates[0][2].'-'.$dates[0][1].'-'.$dates[0][0].' 00:00:00';
       }

       $day->update([
           'date' => $data['date'] ? $date : $day->date,
           'label' => $data['label'] ? $data['label'] : $day->label,
           'type' => $data['type'] ? $data['type'] : $day->type,
           'recoverable' => $data['recoverable'] ? 1 : 0
       ]);

       Alert::success('Bien !', 'Jour modifier avec succés !')->persistent('Fermer');
       return back();
   }
  

   public function handleDeleteHoliday(){
       $data = Input::all();

       $dep = Holiday::find($data['id']);
       if($dep){
           $dep->delete();
       }
       else{
           Alert::error('Veuillez vérifier le jour selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('Jour Supprimé avec succès','Succés')->persistent('Ok');
       return back();
   }




}
