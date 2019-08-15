<?php

namespace App\Modules\Commerce\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Commerce\Models\Provider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;


class ProviderController extends Controller
{
	/**
	* show provider list
	*/
	public function showProviders()
	{
       return view("Commerce::provider.list", [
           'providers' => Provider::all()
       ]);
	}

	/**
	*  show add customer form
	*/
	public function showAddProvider()
	{
      return view('Commerce::provider.add');
	}
    
    /**
    * store new customer
    */
    public function handleAddProvider()
    {
       $data = Input::all();

       $rules = [
           'name' => 'required',
           'reference' => 'required'
       ];

       $messages = [
           'name.required' => 'Saisi le nom du fournisseur',
           'reference.required' => 'Saisi le réference du fournisseur'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $providerData = [
           'name' => $data['name'],
           'reference' => $data['reference'],
           'addresse' => $data['addresse'],
           'telephone' => $data['telephone'],
           'mail' => $data['mail']
       ];

       Provider::create($providerData);
       Alert::success('Bien !', 'Fournisseur ajouté avec succés !')->persistent('Fermer');
       return back();

    }

    /**
    * show edit customer
    */
    public function showEditProvider($id)
    {

       return view('Commerce::provider.edit', [
        'provider' => Provider::findOrFail($id)
       ]);
    }

    /**
    * handle edit customer
    */
    public function handleEditProvider()
    {
      
       $data = Input::all();
       $provider = Provider::findOrFail($data['id']);
       if(!$provider){
       	Alert::warning('Bien !', 'veuillez verifier le fournisseur selectionnée !')->persistent('Fermer');
       return back();
       }
       $rules = [
           'name' => 'required',
           'reference' => 'required'
       ];

       $messages = [
           'name.required' => 'Saisi le nom du fournisseur',
           'reference.required' => 'Saisi le réference du fournisseur'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $provider->update([
           'name' => $data['name'],
           'reference' => $data['reference'],
           'addresse' => $data['addresse'],
           'telephone' => $data['telephone'],
           'mail' => $data['mail']
       ]);

       Alert::success('Bien !', 'Fournisseur modifier avec succés !')->persistent('Fermer');
       return back();
    }

    /**
    * handle delete customer
    */
    public function handleDeleteProvider()
    {
       $data = Input::all();
       $provider = Provider::find($data['id']);
       if($provider){
           $provider->delete();
       }
       else{
           Alert::error('Veuillez vérifier le fournisseur selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('Fournisseur Supprimé avec succès','Succés')->persistent('Ok');
       return back();
    }
}