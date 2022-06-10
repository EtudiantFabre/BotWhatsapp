<?php

namespace App\Http\Controllers;

use App\Models\Agronomme;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AgronommeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Afficher tout les produits
        $agronomme = Agronomme::all();
        return view('agronommes.index')->with('listeagronommes', $agronomme);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('agronommes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enregistre l'Agronomme dans la base de donné.
        $request->validate([
            'nom' => 'bail|required|max:64|min:3',
            'prenom' => 'bail|required|max:64|min:3',
            'tel' => 'bail|required|min:8',
            //'niveau_etude' => 'bail|required',
        ]);
        $personne = Personne::all()->where('nom', '=', $request->nom)->where('prenom', '=',$request->prenom);

        foreach ($personne as $ligne){
            $num_personne = $ligne['num_personne'];
        }
        if (count($personne) !=0){
            //  Si la personne existe alors enregistrer que l'agronomme.
            Agronomme::create(['nom' => $request->nom, 'prenom' =>$request->prenom, 'tel'=>$request->tel, 'niveau_etude'=>$request->niveau_etude, 'num_personne' => $num_personne]);
        } else {
            $personne = Personne::create($request->all());
            Agronomme::create(['nom' => $request->nom, 'prenom' =>$request->prenom, 'tel'=>$request->tel, 'niveau_etude'=>$request->niveau_etude, 'num_personne' => $personne->num_personne]);
        }

        return redirect()->route('agronommes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agronomme  $agronomme
     * @return \Illuminate\Http\Response
     */
    public function show(Agronomme $agronomme)
    {
        //      Affiche un seul agronomme :
        /*$unAgronomme = Agronomme::find($agronomme->numAdmin);
        return view('agronommes.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agronomme  $agronomme
     * @return \Illuminate\Http\Response
     */
    public function edit(Agronomme $agronomme)
    {
        //  Afficher le formulaire d'édition pour la modification:
        if (View::exists('agronommes.edit')){
            return view('agronommes.edit', compact('agronomme'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agronomme  $agronomme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agronomme $agronomme)
    {
        $request->validate([
            'nom' => 'bail|required|max:64|min:3',
            'prenom' => 'bail|required|max:64|min:3',
            'tel' => 'bail|required|min:8',
            //'niveau_etude' => 'bail|required',
        ]);
        $agronomme->nom = $request->nom;
        $agronomme->prenom = $request->prenom;
        $agronomme->tel = $request->tel;
        $agronomme->niveau_etude = $request->niveau_etude;
        $agronomme->save();
        return redirect()->route('agronommes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agronomme  $agronomme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agronomme $agronomme)
    {
        //  Suppression du produit :
        $agronomme->delete();
        return redirect()->route('agronommes.index');
    }
}
