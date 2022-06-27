@extends('layouts.app')
@section('content')

<body>
    <div style="background:rgb(245, 244, 244)" class="rounded container shadow p-3 mb-5 bg-body">
        <h2 class="text-center"><div>Création d'un culture :</div></h2>
    
        <div class="container text-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('cultures.store')}}" method="post">
                {{csrf_field()}}
                @method('post')
                <!--div>
                    <label>Nom de la culture :</label>
                    <td><input type="text" name="nom_culture" placeholder="culture"/></td>
                </div-->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nom de l'agriculteur :</span>
                    </div>
                    <input type="text" class="form-control" name="nom_culture" required placeholder="nom de la culture" aria-label="nom_culture" aria-describedby="basic-addon1">
                </div>

                <!--div>
                    <label>Rendement de la culture (sac/heectar) :</label>
                    <input type="text" name="rendement" required placeholder="rendement">
                </div-->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rendement de la culture (sac/heectar) :</span>
                    </div>
                    <input type="text" class="form-control" name="rendement" required placeholder="Rendement de la culture" aria-label="rendement" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Densité par semestre de la culture :</span>
                    </div>
                    <input type="text" class="form-control" name="densite_semestre" required placeholder="Densité" aria-label="densite_semestre" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <label >Fréquence d'arrosage (par mois) :</label>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td><label class="input-group-text">{{__('Mois : ')}}</label></td>
                            <td><input type="text" class="form-control" name="mois" placeholder="Nombre de fois par mois"/></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
