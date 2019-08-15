<?php

namespace App\Modules\Commerce\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Commerce\Models\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;


class CustomerController extends Controller
{
	/**
	* show customer list
	*/
	public function showCustomer()
	{
       return view("Commerce::customer.list", [
           'customers' => Customer::all()
       ]);
	}

	/**
	*  show add customer form
	*/
	public function showAddCustomer()
	{
      return view('Commerce::customer.add');
	}
    
    /**
    * store new customer
    */
    public function handleAddCustomer()
    {
       $data = Input::all();

       $rules = [
           'name' => 'required',
           'reference' => 'required'
       ];

       $messages = [
           'name.required' => 'Saisi le nom du client',
           'reference.required' => 'Saisi le réference du client'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $CustomerData = [
           'name' => $data['name'],
           'reference' => $data['reference'],
           'addresse' => $data['addresse'],
           'telephone' => $data['telephone'],
           'mail' => $data['mail']
       ];

       Customer::create($CustomerData);
       Alert::success('Bien !', 'Client ajouté avec succés !')->persistent('Fermer');
       return back();

    }

    /**
    * show edit customer
    */
    public function showEditCustomer($id)
    {

       return view('Commerce::customer.edit', [
        'customer' => Customer::findOrFail($id)
       ]);
    }

    /**
    * handle edit customer
    */
    public function handleEditCustomer()
    {
      
       $data = Input::all();
       $customer = Customer::findOrFail($data['id']);
       if(!$customer){
       	Alert::warning('Bien !', 'veuillez verifier le client selectionnée !')->persistent('Fermer');
       return back();
       }
       $rules = [
           'name' => 'required',
           'reference' => 'required'
       ];

       $messages = [
           'name.required' => 'Saisi le nom du client',
           'reference.required' => 'Saisi le réference du client'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $customer->update([
           'name' => $data['name'],
           'reference' => $data['reference'],
           'addresse' => $data['addresse'],
           'telephone' => $data['telephone'],
           'mail' => $data['mail']
       ]);

       Alert::success('Bien !', 'client modifier avec succés !')->persistent('Fermer');
       return back();
    }

    /**
    * handle delete customer
    */
    public function handleDeleteCustomer()
    {
       $data = Input::all();
       $customer = Customer::find($data['id']);
       if($customer){
           $customer->delete();
       }
       else{
           Alert::error('Veuillez vérifier le client selectionné','Erreur')->persistent('Ok');
           return back();
       }
       Alert::success('Clinet Supprimé avec succès','Succés')->persistent('Ok');
       return back();
    }
}