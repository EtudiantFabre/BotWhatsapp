<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ParcelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcelle = Parcelle::all();
        return view('parcelles.index')->with('listeparcelles', $parcelle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('parcelles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enregistre l'Administrateur dans la base de donné.
        $parcelle = Parcelle::all()->where('nature', '=', $request->nature)->where('localisation', '=',$request->localisation);
        //print_r($parcelle);
        if (count($parcelle) != 0){

        } else {
            $request->validate([
                'nature' => 'bail|required|max:64|min:3',
                'region' => 'bail|required|max:64|min:3',
                'ville' => 'bail|required|max:64|min:3',
                'surface' => 'bail|required|numeric|min:1',
                //'num_culture' => 'bail|required',
                //'num_agriculteur' => 'bail|required',
            ]);
            $request['localisation'] = array(
                "region"=>$request->region,
                "ville"=> $request->ville,
            );
            Parcelle::create($request->all());
            //Parcelle::create(['nature' => $request->nature, 'localisation' =>$request->localisation, 'surface'=>$request->surface]);
        }

        return redirect()->route('parcelles.index');
        //return $parcelle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcelle  $parcelle
     * @return \Illuminate\Http\Response
     */
    public function show(Parcelle $parcelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcelle  $parcelle
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcelle $parcelle)
    {
        //  Afficher le formulaire d'édition pour la modification:
        if (View::exists('parcelles.edit')){
            return view('parcelles.edit', compact('parcelle'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcelle  $parcelle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcelle $parcelle)
    {
        $request->validate([
            'nature' => 'bail|required|max:64|min:3',
            'region' => 'bail|required|max:64|min:3',
            'ville' => 'bail|required|max:64|min:3',
            'surface' => 'bail|required|numeric|min:1',
            'num_culture' => 'bail|required',
            'num_agriculteur' => 'bail|required',
        ]);
        //  Met à jour le produit :
        $request['localisation'] = array(
            "region"=>$request->region,
            "ville"=> $request->ville,
        );
        $parcelle->nature = $request->nature;
        $parcelle->surface = $request->surface;
        $parcelle->localisation = $request->localisation;
        $parcelle->num_culture = $request->num_culture;
        $parcelle->num_agriculteur = $request->num_agriculteur;
        $parcelle->save();
        return redirect()->route('parcelles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcelle  $parcelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcelle $parcelle)
    {
        //  Suppression du produit :
        $parcelle->delete();
        return redirect()->route('parcelles.index');
    }
}
