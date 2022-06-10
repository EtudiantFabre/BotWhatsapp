<style>
    body {
        /*text-align: center;*/
        background: #dadfe7;
    }
</style>
<body>
<div><h2>Modification d'un agriculteur :</h2></div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('agriculteurs.update', $agriculteur)}}" method="post">
    {{csrf_field()}}
    @method('put')
    {{--$admin--}}

    <div>
        <label>Nom de l'agriculteur :</label>
        <input type="text" name="nom" value="{{$agriculteur->nom}}">
    </div>
    <div>
        <label>Prénom de l'administrateur :</label>
        <input type="text" name="prenom" value="{{$agriculteur->prenom}}">
    </div>
    <div>
        <label>Numéro de télephone de l'administrateur :</label>
        <input type="text" name="tel" value="{{$agriculteur->tel}}">
    </div>
    <div>
        <input type="submit" name="sauvegarder" value="Sauvegarder">
    </div>
</form>
</body>
