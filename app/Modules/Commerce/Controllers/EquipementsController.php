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



class EquipementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function showEquipements(){







        $listG=DB::table('equipements')->orderBy('categorie_id')->get();
        //$listG=Array('list'=>$listG );

        $listS=DB::table('equipements')->where('status','=','1')->get();
       // $listS=Array('listS'=>$listS);

        $listM=DB::table('equipements')->where('status','=','3')->get();
        //$listm=Array('listm'=>$listm);

        $listDM=DB::table('equipements')->where('status','=','4')->get();
        //$listDM=Array('listDM'=>$listDM);

        $listAR=DB::table('equipements')->where('status','=','5')->get();
      //  $listAR=Array('listAR'=>$listAR);

        $listR=DB::table('equipements')->where('status','=','6')->get();
      //  $listR=Array('listR'=>$listR);


        $listO=DB::table('equipements')->where('status','=','2')->get();

        $results = DB::select('select  C.name , C.reference ,E.n_serie ,E.status from categories C ,equipements E where E.categorie_id = C.id ORDER BY  E.categorie_id');


        $cat=DB::table('categories')->get();

        return view('Commerce::Stock.list',[
           'listG' => $listG,
           'listO' => $listO, 
           'listS' => $listS, 
           'listM' => $listM,
           'listDM' => $listDM,
           'listR' => $listR,
           'listAR'=>$listAR,
            'results'=>$results
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
}