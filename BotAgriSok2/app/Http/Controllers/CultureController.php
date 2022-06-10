<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Afficher tout les cultures :
        $culture = Culture::all();
        return view('cultures.index')->with('listecultures', $culture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('cultures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enregistre la culture dans la base de donné.
        $request->validate([
            'nom_culture' => 'bail|required|min:3',
            'rendement' => 'bail|required|min:1',
            'mois' => 'required',
        ]);
        $request['frequence_arrosage'] = array(
            "mois"=>$request->mois,
        );
        $culture = Culture::all()->where('nom_culture', '=', $request->nom_culture);

        if (count($culture) ==0){
            //  Si la culture n'existe pas, alors enregistrer que l'admin.
            Culture::create($request->all());
        }/* else {

            Agronomme::create(['nom' => $request->nom, 'prenom' =>$request->prenom, 'tel'=>$request->tel, 'niveauEtude'=>$request->niveauEtude, 'numPersonne' => $personne->numPersonne]);
        }
        Culture::create(['nomCulture' => $request->nomCulture, 'rendement' =>$request->rendement, 'densiteSemestre'=>$request->densiteSemestre, 'frequenceArrosage'=>$request->frequenceArrosage, 'numCulture' => $numCulture]);*/

        return redirect()->route('cultures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function show(Culture $culture)
    {
        //      Affiche un seul agronomme :
        /*$unAgronomme = Agronomme::find($agronomme->numAdmin);
        return view('agronommes.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function edit(Culture $culture)
    {
        if (View::exists('cultures.edit')){
            return view('cultures.edit', compact('culture'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Culture $culture)
    {
        $request->validate([
            'nom_culture' => 'bail|required|min:3',
            'rendement' => 'bail|required|min:1',
            'mois' => 'required',
        ]);
        $request['frequence_arrosage'] = array(
            "mois"=>$request->mois,
        );
        $culture->nom_culture = $request->nom_culture;
        $culture->rendement = $request->rendement;
        $culture->densite_semestre = $request->densite_semestre;
        $culture->frequence_arrosage = $request->frequence_arrosage;
        $culture->save();
        return redirect()->route('cultures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Culture $culture)
    {
        //  Suppression d'une culture :
        $culture->delete();
        return redirect()->route('cultures.index');
    }
}
