@extends('layouts.app')
@section('content')
<body>
    <div style="background:rgb(245, 244, 244)" class="rounded container shadow p-3 mb-5 bg-body">
        <h2 class="text-center"><div>Création d'un agronomme :</div></h2>
    
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
            <form action="{{route('agronommes.store')}}" method="post">
                {{csrf_field()}}
                @method('post')
                <div class="input-group mb-3">
                    <div class="input-group-prepend ">
                    <span class="input-group-text" id="basic-addon1">Nom de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="nom" required placeholder="nom de l'agronomme" aria-label="nom" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Prénom de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="prenom" required placeholder="prénom de l'admin" aria-label="prenom" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numéro de télephone de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="tel" required placeholder="numéro" aria-label="tel" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Niveau d'étude de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="niveau_etude" required placeholder="Niveau d'étude" aria-label="niveau_etude" aria-describedby="basic-addon1">
                </div>
                <div>
                    <!--input class="sauv" type="submit" name="sauvegarder" value="Sauvegerder"-->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sauvegerder</button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection