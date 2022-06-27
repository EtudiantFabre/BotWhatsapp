@extends('layouts.app')
@section('content')
<style>
   /*body {
        text-align: center;
        background: #dadfe7;
    }*/
</style>
<body>
    <div style="background :rgb(183, 183, 183)" class="rounded shadow p-3 mb-5 bg-body container">
        <h1 class="text-center">Modification de l'administrateur {{$admin->nom}} :</h1>
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
            <form action="{{route('admins.update', $admin)}}" method="post">
                {{csrf_field()}}
                @method('put')
                {{--$admin--}}

                <!--div>
                    <label>Nom de l'administrateur :</label>
                    <input type="text" name="nom" value="{{--$admin->nom--}}">
                </div-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nom de l'administrateur :</span>
                    </div>
                    <input type="text" class="form-control" name="nom" required value="{{$admin->nom}}" aria-label="nom" aria-describedby="basic-addon1">
                </div>

                <!--div>
                    <label>Prénom de l'administrateur :</label>
                    <input type="text" name="prenom" value="{{--$admin->prenom--}}">
                </div-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Prénom de l'administrateur :</span>
                    </div>
                    <input type="text" class="form-control" name="prenom" required value="{{$admin->prenom}}" aria-label="prenom" aria-describedby="basic-addon1">
                </div>
                <!--div>
                    <label>Numéro de télephone de l'administrateur :</label>
                    <input type="text" name="tel" value="{{--$admin->tel--}}">
                </div-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numéro de télephone de l'administrateur :</span>
                    </div>
                    <input type="tel" class="form-control" name="tel" required value="{{$admin->tel}}" aria-label="tel" aria-describedby="basic-addon1">
                </div>
                <div>
                    <!--input class="sauv" type="submit" name="sauvegarder" value="Sauvegerder"-->
                    <button type="submit" class="btn btn-outline-warning btn-lg btn-block">Enregistrer les modifications</button>
                </div>
            </form>
</body>

@endsection