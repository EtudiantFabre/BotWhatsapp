<?php

namespace App\Http\Controllers;

use App\Models\Agriculteur;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AgriculteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Afficher tout les produits
        $agriculteur = Agriculteur::all();
        return view('agriculteurs.index')->with('listeagriculteurs', $agriculteur);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('agriculteurs.create');
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
            'nom' => 'bail|required|max:64|min:3',
            'prenom' => 'bail|required|max:64|min:3',
            'tel' => 'required|numeric|min:8',
        ]);
        $personne = Personne::all()->where('nom', '=', $request->nom)->where('prenom', '=',$request->prenom);
        //dd($personne);
        //print_r($personne["numPersonne"]);
        foreach ($personne as $ligne){
            $numPersonne = $ligne['num_personne'];
        }

        /*echo $personne;*/
        if (count($personne) !=0){
            // S'exécute si la personne existe.
            Agriculteur::create(['nom' => $request->nom, 'prenom' =>$request->prenom, 'tel'=>$request->tel, 'num_personne' => $num_personne]);
        } else {
            $personne = Personne::create($request->all());
            Agriculteur::create(['nom' => $request->nom, 'prenom' =>$request->prenom, 'tel'=>$request->tel, 'num_personne' => $personne->num_personne]);
        }

        return redirect()->route('agriculteurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function show(Agriculteur $agriculteur)
    {
        //      Affiche un seul admin :
        /*$unAdmin = Admin::find($admin->numAdmin);
        return view('admins.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Agriculteur $agriculteur)
    {
        //  Afficher le formulaire d'édition pour la modification:
        if (View::exists('agriculteurs.edit')){
            return view('agriculteurs.edit', compact('agriculteur'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agriculteur $agriculteur)
    {
        //  Met à jour l'agriculteur :
        $request->validate([
            'nom' => 'bail|required|max:64|min:3',
            'prenom' => 'bail|required|max:64|min:3',
            'tel' => 'bail|required|numeric|min:8',
        ]);
        $agriculteur->nom = $request->nom;
        $agriculteur->prenom = $request->prenom;
        $agriculteur->tel = $request->tel;
        $agriculteur->save();
        return redirect()->route('agriculteurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agriculteur $agriculteur)
    {
        //  Suppression du produit :
        $agriculteur->delete();
        return redirect()->route('agriculteurs.index');
    }
}
