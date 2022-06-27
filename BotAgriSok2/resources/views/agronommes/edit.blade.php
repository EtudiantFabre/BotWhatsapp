@extends('layouts.app')
@section('content')
<style>
    /*body {
        text-align: center;
        background: #dadfe7;
    }*/
</style>
<body>
    <div style="background:rgb(183, 183, 183)" class="rounded container shadow p-3 mb-5 bg-body">
        <h1 class="text-center">Modification de l'agronomme {{$agronomme->nom}} :</h1>
        <div class="container text-center ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('agronommes.update', $agronomme)}}" method="post">
                {{csrf_field()}}
                @method('put')
                {{--$admin--}}

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nom de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="nom" required value="{{$agronomme->nom}}" aria-label="nom" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Prénom de l'agronomme :</span>
                    </div>
                    <input type="text" class="form-control" name="prenom" required value="{{$agronomme->prenom}}" aria-label="prenom" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numéro de télephone de l'agronomme :</span>
                    </div>
                    <input type="tel" class="form-control" name="tel" required value="{{$agronomme->tel}}" aria-label="tel" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Niveau d'étude de l'agronomme :</span>
                    </div>
                    <input type="tel" class="form-control" name="niveau_etude" required value="{{$agronomme->niveau_etude}}" aria-label="niveau_etude" aria-describedby="basic-addon1">
                </div>
                <div>
                    <!--input class="sauv" type="submit" name="sauvegarder" value="Sauvegerder"-->
                    <button type="submit" class="btn btn-outline-warning btn-lg btn-block">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection