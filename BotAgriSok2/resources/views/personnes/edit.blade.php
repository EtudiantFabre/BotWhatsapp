<style>
    body {
        /*text-align: center;*/
        background: #dadfe7;
    }
</style>
<body>
    <div><h2>Modification d'une personne :</h2></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('personnes.update', $personne)}}" method="post">
        {{csrf_field()}}
        @method('put')
        {{--$admin--}}

        <div>
            <label>Nom de la personne :</label>
            <input type="text" name="nom" value="{{$personne->nom}}">
        </div>
        <div>
            <label>Prénom de la personne :</label>
            <input type="text" name="prenom" value="{{$personne->prenom}}">
        </div>
        <div>
            <label>Numéro de télephone de la personne :</label>
            <input type="text" name="tel" value="{{$personne->tel}}">
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Sauvegarder">
        </div>
    </form>
</body>
