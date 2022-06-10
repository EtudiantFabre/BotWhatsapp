
<body>
    <div><h2>Création d'une personne :</h2></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('personnes.store')}}" method="post">
        {{csrf_field()}}
        @method('post')
        <div>
            <label>Nom de la personne :</label>
            <input type="text" name="nom" placeholder="nom">
        </div>
        <div>
            <label>Prénom de la personne :</label>
            <input type="text" name="prenom" placeholder="prénom">
        </div>
        <div>
            <label>Numéro de télephone :</label>
            <input type="text" name="tel" placeholder="numéro">
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Sauvegarder">
        </div>
    </form>
</body>
