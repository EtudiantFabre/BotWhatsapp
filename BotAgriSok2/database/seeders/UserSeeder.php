<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\Personne;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personne = Personne::create([
            'nom' => 'traore',
            'prenom' => 'ariziki',
            'sexe' => 'Masculin',
            'dateNaiss'=> date('20/02/2000') ,
            'adresse'=>  array("ville"=>"sokodé",
                "quartier"=>"Didauré","rue"=>"12eme", "BP"=>"210") ,
            'email' => Str::random(10).'@gmail.com',
            'telephone' => '90015284',
        ]);
        $employe = Employe::create([
            'numPersonne' => $personne->numPersonne,
            'nomUtilisateur' => 'traore',
            'motDePasse' => Hash::make('password'),
            'status'=> 1,
            //'avatar'=> $personne->avatar
        ]);

        $employe->assignRole('Admin');
    }
}
