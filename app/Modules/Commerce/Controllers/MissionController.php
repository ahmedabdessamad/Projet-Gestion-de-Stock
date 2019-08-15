<?php

namespace App\Modules\Commerce\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Commerce\Models\Mission;
use App\Modules\Commerce\Models\Customer;
use App\Modules\Commerce\Models\Equipement;
use App\Modules\Commerce\Models\MissionSpeakers;
use App\Modules\Commerce\Models\Categorie;
use App\Modules\Commerce\Models\MissionEquipement;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;
use Auth;
use DB;


class MissionController extends Controller
{
	/**
	* Show all mission
	*/
	public function showMission()
	{
		return view('Commerce::mission.list',[
            'missions' => Mission::all()
		]);
	}
 
    /**
    * show Add mission
    */
    public function showAddMission()
    {
    	return view('Commerce::mission.add', [
    		'users' =>  User::all(),
    		'equipements' => DB::table('equipements')->whereIn('status', [1, 6])->get()
    	]);
    }

    /**
    * Store new Mission
    */
    public function handleAddMission()
    {
      $data = Input::all();
      $mission = new Mission;
      $mission->numero = $data['numero'];
      $mission->date = date('Y-m-d', strtotime($data['date']));
      $mission->customer_id = $data['site'];
      $mission->save();
      if($data['speakers']){
        foreach(explode(',', $data['speakers']) as $speaker){
        	$mission_speakers = new MissionSpeakers();
        	$mission_speakers->mission_id = $mission->id;
        	$mission_speakers->employee_id = $speaker;
        	$mission_speakers->save();
        }
      }else{
        	$mission_speakers = new MissionSpeakers();
        	$mission_speakers->mission_id = $mission->id;
        	$mission_speakers->employee_id = Auth::id;
        	$mission_speakers->save();
      }
      
      foreach(explode(',', $data['equipements']) as $equipement){
          $mission_equipement = new MissionEquipement();
        	$mission_equipement->mission_id = $mission->id;
        	$mission_equipement->equipement_id = $equipement;
        	$mission_equipement->save();
          Equipement::where('id' , $equipement)->update(['status' => 2]);
          $cat = Equipement::find($equipement)->Categorie()->first();
          $qte = $cat->quantite - 1;
          DB::table('categories')
            ->where('id', $cat->id)
            ->update(['quantite' => $qte]);
      }
       Alert::success('Bien !', 'Mission ajouté avec succés !')->persistent('Fermer');
       return back();
     }



	/**
	* follow mission
	*/
	public function followMission($id)
	{
      $equipements_ids = MissionEquipement::select('equipement_id')->where('mission_id', $id)->get()->toArray();
      $equipements = DB::table('equipements')->whereIn('id', $equipements_ids)->get();
      $speakers_ids = MissionSpeakers::select('employee_id')->where('mission_id', $id)->get()->toArray();
      $speakers = DB::table('users')->whereIn('id', $speakers_ids)->get();
      return view('Commerce::mission.follow',[
        'mission' => Mission::where('id', $id)->first(),
        'equipements' => $equipements,
        'speakers' => $speakers
      ]);
	}
    
    /**
    * API get Sites
    */
    public function missionGetSites()
    {
       return response()->json([
         'customers' => Customer::all()
       ]);
    }

    /**
    * API Remove speakers
    */
    public function removeSpeaker()
    {
       $data = Input::all();
       $speakers = MissionSpeakers::where('employee_id', $data['id']);
       if($speakers){
           $speakers->delete();
       }
       else{
           Alert::error('Veuillez vérifier l\'employee selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('employee Supprimé avec succès','Succés')->persistent('Ok');
       return back();
    }

    /**
    * API change product status
    */
    public function ApiChangeProductStatus(){
      $data = Input::all();
      $Equipement = Equipement::find($data['id']);
      $Equipement->update([
           'status' => $data['status'] ? $data['status'] : $Equipement->status,
       ]);
      if($data['status'] == 1){
        $mission_equipment = MissionEquipement::where('mission_id', $data['mission_id'])
          ->where('equipement_id', $data['id'])->delete();
          $cat = Equipement::find($data['id'])->Categorie()->first();
          $qte = $cat->quantite + 1;
          DB::table('categories')
            ->where('id', $cat->id)
            ->update(['quantite' => $qte]);
      }
      $equipements_ids = MissionEquipement::select('equipement_id')->where('mission_id', $data['mission_id'])->get()->toArray();
      $equipements = DB::table('equipements')->whereIn('id', $equipements_ids)->get();
      return response()->json(['equipements' => $equipements]);
    }

} 