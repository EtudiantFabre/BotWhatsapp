<style>
    body {
        /*text-align: center;*/
        background: #dadfe7;
    }
</style>
<body>
<div><h2>Modification d'un agronomme :</h2></div>
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

    <div>
        <label>Nom de l'agronomme :</label>
        <input type="text" name="nom" value="{{$agronomme->nom}}">
    </div>
    <div>
        <label>Prénom de l'agronomme :</label>
        <input type="text" name="prenom" value="{{$agronomme->prenom}}">
    </div>
    <div>
        <label>Numéro de télephone de l'agronomme :</label>
        <input type="text" name="tel" value="{{$agronomme->tel}}">
    </div>
    <div>
        <label>Niveau d'étude de l'agronomme :</label>
        <input type="text" name="niveau_etude" value="{{$agronomme->niveau_etude}}">
    </div>
    <div>
        <input type="submit" name="sauvegarder" value="Sauvegarder">
    </div>
</form>
</body>
