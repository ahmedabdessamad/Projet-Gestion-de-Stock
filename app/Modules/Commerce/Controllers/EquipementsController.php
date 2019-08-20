<?php

namespace App\Modules\Commerce\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Commerce\Models\Equipement;
use App\Modules\Commerce\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Alert;
use DB;
use App\Modules\Commerce\Models\Provider;



class EquipementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function showEquipements(){









        $results = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id And E.status = 1  ORDER BY  E.categorie_id');
        $resultsO = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id   And E.status = 2  ORDER BY  E.categorie_id');
        $resultsM = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id   And E.status = 3  ORDER BY  E.categorie_id');
        $resultsD = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id   And E.status = 4  ORDER BY  E.categorie_id');
        $resultsAR = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id   And E.status = 5  ORDER BY  E.categorie_id');
        $resultsR = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id   And E.status = 6  ORDER BY  E.categorie_id');


        $cat=DB::table('categories')->get();

        return view('Commerce::Stock.list',[

            'results'=>$results,
            'resultsO'=>$resultsO,
            'resultsM'=>$resultsM,
            'resultsD'=>$resultsD,
            'resultsAR'=>$resultsAR,
            'resultsR'=>$resultsR,


        ]);
    }

	
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddequipements()
    {
        return view('Commerce::equipements.add');

    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $equipements = new Equipements([
            'product' => $request->get('produit'),
            'reference' => $request->get("réference"),
            'n_serie' => $request->get('n_serie'),
            'quantitie' => $request->get('quantitie'),
            'quantitie_min' => $request->get('quatitie_min'),
            'categorie_id' => $request->get('categorie_id'),
            'provider_id' => $request->get('provider_id'),
            'customer_id' => $request->get('customer_id'),
            'status' => $request->get('status'),
           
           


        ]);
        $equipements->save();
        return redirect('/equipements')->with('success', 'equipements saved!');
    }

    public function handleAddequipements()
    {
       $data = Input::all();

       $rules = [
           'product' => 'required',
           'reference' => 'required'
       ];

       $messages = [
           'produit.required' => 'faut que vous saisez le nom du produit',
           'reference.required' => 'faut que vous saisiez la reference de l\'equipements'
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return redirect()->back()->withInput()->withErrors($validation->errors());
       }

       $equipementsData = [
           'product' => $data['product'],
           'reference' => $data['reference'],
           'n_serie' => $data['n_serie'],
           'quantitie' => $data['quantitie'],
           'quantitie_min' => $data['quantitie_min'],
           'categorie_id' => $data['categorie_id'],
           'provider_id' => $data['provider_id'],
           'customer_id' => $data['customer_id'],
           'status' => $data['status'],

       ];

       Equipements::create($equipementsData);
       Alert::success('Bien !', 'Equipements ajouté avec succés !')->persistent('Fermer');
       return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCategorie_id()
    {
     return response()->json([
    'cats' => Categorie::all()
    ]);
    }

    public function getProvider_id(){
      return response()->json([
        'provider' => Provider::all()
      ]);
    }
}