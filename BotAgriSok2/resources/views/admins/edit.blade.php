<style>
    body {
        /*text-align: center;*/
        background: #dadfe7;
    }
</style>
<body>
    <div><h2>Modification d'un administrateur :</h2></div>
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

        <div>
            <label>Nom de l'administrateur :</label>
            <input type="text" name="nom" value="{{$admin->nom}}">
        </div>
        <div>
            <label>Prénom de l'administrateur :</label>
            <input type="text" name="prenom" value="{{$admin->prenom}}">
        </div>
        <div>
            <label>Numéro de télephone de l'administrateur :</label>
            <input type="text" name="tel" value="{{$admin->tel}}">
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Sauvegarder">
        </div>
    </form>
</body>
