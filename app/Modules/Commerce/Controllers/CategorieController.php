<?php

namespace App\Modules\Commerce\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Commerce\Models\Categorie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;


class CategorieController extends Controller
{

	/**
	* Show all cetgories
	*/
	public function showCategorie(){
		return view('Commerce::categorie.list', [
          'categories' => Categorie::all()
		]);
	}

	/**
	* store new catgorie
	*/
	public function handleAddCategorie(){

       $data = Input::all();
       $rules = [
           'name' => 'required',
           'reference' => 'required|unique:categories',
       ];

       $messages = [
           'name.required' => 'Saisi le nom du categorie',
           'reference.required' => 'veuillez renseigner ce champ',
           'reference.unique' => 'cette reference est existe déja'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $catData = [
           'name' => $data['name'],
           'reference' => $data['reference'],
           'quantite_min' => $data['quantite_min'],
           'quantite' => $data['quantite']
       ];

       Categorie::create($catData);
       Alert::success('Bien !', 'Categorie ajouté avec succés !')->persistent('Fermer');
       return back();

	}

	/**
	* edit categorie
	*/
	public function handleEditCategorie()
	{
      $data = Input::all();


       $rules = [
           'name' => 'required',
           'reference' => 'required|unique:categories'. ',reference,' . $data['id'],
       ];

       $messages = [
           'name.required' => 'Saisi le nom du categorie',
           'reference.required' => 'veuillez renseigner ce champ',
           'reference.unique' => 'cette reference est existe déja'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $cat = Categorie::find($data['id']);
       if(!$cat){
           Alert::error('Erreur', 'Categorie non trouvé')->persistent('Fermer');
           return back();
       }
       $cat->update([
           'name' => $data['name'] ? $data['name'] : $cat->name,
           'reference' => $data['reference'] ? $data['reference'] : $cat->reference,
           'quantite_min' => $data['quantite_min'] ? $data['quantite_min'] : $cat->quantite_min,
           'quantite' => $data['quantite'] ? $data['quantite'] : $cat->quantite
       ]);

       Alert::success('Bien !', 'categorie modifier avec succés !')->persistent('Fermer');
       return back();
	}

	/**
	* delete categorie
	*/
	public function handleDeleteCategorie()
	{
       $data = Input::all();
       $cat = Categorie::find($data['id']);
       if($cat){
           $cat->delete();
       }
       else{
           Alert::error('Veuillez vérifier la categorie selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('categorie Supprimé avec succès','Succés')->persistent('Ok');
       return back();
	}
}