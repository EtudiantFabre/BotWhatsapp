<?php

namespace App\Http\Controllers;

use App\Models\Proposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PropositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Afficher tout les produits
        $proposition = Proposition::all();
        return view('propositions.index')->with('listespropositions', $proposition);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('propositions.create');
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
        $request->validate([
            'dateProposition' => 'bail|required',
            'numCulture' => 'numeric|required',
            'numAgronomme' => 'required|numeric',
        ]);
        $proposition = Proposition::all()->where('dateProposition', '=', $request->dateProposition)->where('prenom', '=',$request->prenom);
        //dd($personne);
        //print_r($personne["numPersonne"]);
        foreach ($proposition as $ligne){
            $numProposition = $ligne['numProposition'];
        }

        /*echo $personne;*/
        if (count($proposition) ==0){
            // S'exécute si la personne n'existe pas.
            Proposition::create($request->all());
        }

        return redirect()->route('listesPropositions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposition  $proposition
     * @return \Illuminate\Http\Response
     */
    public function show(Proposition $proposition)
    {
        //      Affiche une seul proposition :
        /*$uneProposition = Proposition::find($proposition->numProposition);
        return view('propositions.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposition  $proposition
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposition $proposition)
    {
        //  Afficher le formulaire d'édition pour la modification:
        if (View::exists('propositions.edit')){
            return view('propositions.edit')->with('proposition', $proposition);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposition  $proposition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposition $proposition)
    {
        $request->validate([
            'dateProposition' => 'bail|required',
            'numCulture' => 'numeric|required',
            'numAgronomme' => 'required|numeric',
        ]);
        $proposition->dateProposition = $request->dateProposition;
        $proposition->numCulture = $request->numCulture;
        $proposition->numAgronomme = $request->numAgronomme;
        $proposition->save();
        return redirect()->route('listesPropositions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposition  $proposition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposition $proposition)
    {
        $proposition->delete();
        return redirect()->route('listesPropositions');
    }
}
