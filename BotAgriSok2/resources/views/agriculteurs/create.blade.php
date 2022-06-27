@extends('layouts.app')
@section('content')

<body>
    <div style="background:rgb(245, 244, 244)" class="rounded shadow p-3 mb-5 bg-body container">
        <h2 class="text-center"><div>Création d'un agriculteur :</div></h2>
    
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
            <form action="{{route('agriculteurs.store')}}" method="post">
                {{csrf_field()}}
                @method('post')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nom de l'agriculteur :</span>
                    </div>
                    <input type="text" class="form-control" name="nom" required placeholder="nom de l'admin" aria-label="nom" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Prénom de l'agriculteur :</span>
                    </div>
                    <input type="text" class="form-control" name="prenom" required placeholder="prénom de l'agriculteur" aria-label="prenom" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numéro de télephone de l'agriculteur :</span>
                    </div>
                    <input type="tel" class="form-control" name="tel" required placeholder="Numéro de téléphone" aria-label="tel" aria-describedby="basic-addon1">
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
