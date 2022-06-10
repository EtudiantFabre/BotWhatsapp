<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Afficher toute les personnes :
        $personne = Personne::all();
        return view('personnes.index')->with('listepersonnes', $personne);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Afficher le formulaire :
        return view('personnes.create');
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
            'nom' => 'bail|required|min:3',
            'prenom' => 'bail|required|min:1',
            'tel' => 'required',
        ]);
        $personne = Personne::all()->where('nom', '=', $request->nom)->where('prenom', '=',$request->prenom);

        /*foreach ($personne as $ligne){
            $numPersonne = $ligne['numPersonne'];
        }*/

        if (count($personne) ==0){
            // S'exécute si la personne n'existe pas.
            Personne::create($request->all());
        }

        return redirect()->route('personnes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //      Affiche une seule personne :
        /*$unePersonne = Personne::find($personne->numPersonne);
        return view('personnes.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //  Afficher le formulaire d'édition pour la modification de la personne :
        if (View::exists('personnes.edit')){
            return view('personnes.edit', compact('personne'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //  Met à jour la personne :
        $request->validate([
            'nom' => 'bail|required|max:80|min:3',
            'prenom' => 'bail|required|max:80|min:3',
            'tel' => 'bail|required|min:8',
        ]);
        $personne->nom = $request->nom;
        $personne->prenom = $request->prenom;
        $personne->tel = $request->tel;
        $personne->save();
        return redirect()->route('personnes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //  Suppression du personne :
        $personne->delete();
        return redirect()->route('personnes.index');
    }
}
