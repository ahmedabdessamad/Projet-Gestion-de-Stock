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
use App\Modules\Commerce\Models\CommerceMediaReport;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;
use Auth;
use DB;
use PDF;



class MissionController extends Controller
{
 
  /**
  * génerer le bon de sortie pour une mission
  */
  public function generateGoodOutput($id)
  {

     $equipements_ids = MissionEquipement::select('equipement_id')->where('mission_id', $id)->get()->toArray();
   //  dd(Equipement::whereIn('id', $equipements_ids)->get());
     $speakers_ids = MissionSpeakers::select('employee_id')->where('mission_id', $id)->get()->toArray();
           $mission = Mission::where('id', $id)->first();
           $speakers = User::whereIn('id' , $speakers_ids)->get();
           $equipements = Equipement::whereIn('id', $equipements_ids);
      $view = \View::make('Commerce::Pdf.BS',[
            'mission' => Mission::where('id', $id)->first(),
            'speakers' => User::whereIn('id' , $speakers_ids)->get(),
            'equipements' => Equipement::whereIn('id', $equipements_ids)->get()
      ]);
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice');
  }

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
      $mission_equipements = [];
      $equipements = Equipement::whereIn('status',['1','6'])->with('categorie')->get();
            foreach ($equipements as $equipment) {
              $mission_equipements[$equipment->categorie_id]['cat'] = $equipment->categorie()->first();
              $mission_equipements[$equipment->categorie_id]['equip'][] = $equipment;
            }
    	return view('Commerce::mission.add', [
    		'users' =>  User::all(),
    		'equipements' => $mission_equipements
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
      $mission->matricule = $data['matricule'];
      $mission->destination_id = $data['destination'];
      $mission->etat = 0;
      $mission->save();
      if($data['speakers']){
        foreach(explode(',', $data['speakers']) as $speaker){
        	$mission_speakers = new MissionSpeakers();
        	$mission_speakers->mission_id = $mission->id;
        	$mission_speakers->employee_id = $speaker;
        	$mission_speakers->save();
        }
      }
             // dd($data['equipements']);

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
      $equipements = Equipement::whereIn('id', $equipements_ids)->get();
      $speakers_ids = MissionSpeakers::select('employee_id')->where('mission_id', $id)->get()->toArray();
      $speakers = User::whereIn('id', $speakers_ids)->get();
      $dismounted_equipements = DB::table('equipements')->whereIn('id', $equipements_ids)->where('status', 4)->get();
      $available_equipement = Equipement::whereIn('status', ['1', '6'])->get();
      $users = User::all();
      $media = CommerceMediaReport::where('mission_id', $id)->get();
     // dd($dismounted_equipements);
      return view('Commerce::mission.follow',[
        'mission' => Mission::where('id', $id)->first(),
        'equipements' => $equipements,
        'speakers' => $speakers,
        'dismounted_equipements' => $dismounted_equipements,
        'available_equipement' => $available_equipement,
        'users' => $users,
        'medias' => $media
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
        /*$mission_equipment = MissionEquipement::where('mission_id', $data['mission_id'])
          ->where('equipement_id', $data['id'])->delete();*/
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

    /**
    * add equipements for one mission
    */
    public function handleAddEquipement()
    {
      $data = Input::all();
      if($data['status'] == 0) {
      foreach (explode(',', $data['equipments']) as $equipement) {
        MissionEquipement::create([
          'mission_id' => $data['mission'],
          'equipement_id' => $equipement
        ]);
          $cat = Equipement::find($equipement)->Categorie()->first();
          $qte = $cat->quantite + 1;
          DB::table('categories')
            ->where('id', $cat->id)
            ->update(['quantite' => $qte]);
          Equipement::where('id', $equipement)->update(['status'=> 2]);
      }
    } elseif ($data['status'] == 4) {
      $dismount = Equipement::create([
       'n_serie' => $data['n_serie'],
       'categorie_id' => $data['categorie_id'],
       'provider_id' => $data['provider_id'],
       'status' => 4
      ]);
      MissionEquipement::create([
          'mission_id' => $data['mission'],
          'equipement_id' => $dismount->id
        ]);
    }
      Alert::success('Un ou pleusieurs equipements ajoutée avec succes','Succés')->persistent('Ok');
      return back();
    }

    /**
    * add speaker for one mission
    */
    public function handleAddSpeaker()
    {
      $data = Input::all();
      foreach (explode(',', $data['speakers']) as $speaker) {
        MissionSpeakers::create([
          'mission_id' => $data['mission'],
          'employee_id' => $speaker
        ]);
      }
      Alert::success('Un ou pleusieurs intervenant ajoutée avec succes','Succés')->persistent('Ok');
      return back();
    }

    /**
    * add media for one mission
    */
    public function addMedia(){
      $data = Input::all();
       $file = $data['image'];
            $imagePath = 'storages/images/commerce/';
            $filename = 'commerce' . '-'.time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $image =  $filename;
            CommerceMediaReport::create([
             'mission_id' => $data['mission'],
             'image' => $filename,
             'etat' => $data['status']
            ]);
        Alert::success('une image ete ajoutée avec succes','Succés')->persistent('Ok');
      return back();
    }

} 