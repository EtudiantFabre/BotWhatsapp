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
        <h1 class="text-center">Modification de la culture {{$culture->nom_culture}} :</h1>
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
            <form action="{{route('cultures.update', $culture)}}" method="post">
                {{csrf_field()}}
                @method('put')

                <!--div>
                    <label>Nom de la culture :</label>
                    <input type="text" name="nom_culture" value="{{$culture->nom_culture}}">
                </div-->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nom de la culture :</span>
                    </div>
                    <input type="text" class="form-control" name="nom_culture" required value="{{$culture->nom_culture}}" aria-label="nom_culture" aria-describedby="basic-addon1">
                </div>

                <!--div>
                    <label>Rendement :</label>
                    <input type="text" name="rendement" value="{{$culture->rendement}}">
                </div-->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rendement de la culture :</span>
                    </div>
                    <input type="text" class="form-control" name="rendement" required value="{{$culture->rendement}}" aria-label="rendement" aria-describedby="basic-addon1">
                </div>
                <!--div>
                    <label>Densité par semestre :</label>
                    <input type="text" name="densite_semestre" value="{{$culture->densite_semestre}}">
                </div-->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Densité par semestre :</span>
                    </div>
                    <input type="text" class="form-control" name="densite_semestre" required value="{{$culture->densite_semestre}}" aria-label="densite_semestre" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <label>Fréquence d'arrosage :</label>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td><label>{{__('Mois : ')}}</label></td>
                            <td><input type="text" class="form-control" name="mois" value="{{$culture->frequence_arrosage['mois']}}"/></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <!--input class="sauv" type="submit" name="sauvegarder" value="Sauvegerder"-->
                    <button type="submit" class="btn btn-outline-warning btn-lg btn-block">Enregistrer les modifications</button>
                </div>
            </form>
</body>

@endsection