<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body class="container bg-light">
    <h1 class="text-center fs-1">Listes des propositions :</h1>
    <div class="container">
        <table class="table table-dange table-hover table-striped table-bordered border-primary text-center justify-content-center">
            <tr class="table-active">
                <thead class="table-dark">
                    <th scope="row">Numéro de la proposition</th>
                    <th scope="row">Date de la proposition</th>
                    <th scope="row">Num de la culture</th>
                    <th scope="row">Numéro de l'agronomme</th>
                    <th scope="row">Actions</th>
                </thead>
            </tr>

            @foreach($listespropositions as $proposition)

                <tr>
                    <td colspan="1" class="table-active">
                        {{$proposition->numProposition}}
                    </td>
                    <td colspan="1" class="table-active">
                        {{$proposition->dateProposition}}
                    </td>
                    <td colspan="1" class="table-active">
                        {{$proposition->numCulture}}
                    </td>
                    <td colspan="1" class="table-active">
                        {{$proposition->numAgronomme}}
                    </td>

                    <td class="boutton, table-active" colspan="1">
                        <form action="{{route('modifierProposition', $proposition->numProposition)}}" method="get" style="...">
                            @csrf

                            <button type="submit" class="btn btn-secondary">Modifier</button>
                        </form>
                        <form action="{{route('suppression', $proposition->numProposition)}}" method="post" onsubmit="return AccepterSuppression()" style="...">
                            @csrf

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <h2 class="fs-2">Actions suplementataire sur la base de donné :</h2>

    <form class="fleche" action="{{route('creerProposition')}}" method="get" style="...">
        <!--h3>Créer un nouveau Administrateur :</h3-->
        <button type="submit" class="btn btn-primary btn-lg">Ajouter une proposition</button>
    </form>

    <form class="fleche" action="{{--route('admins.show', $listeadmins[0])--}}" method="get" style="...">
        <!--h3>Afficher une proposition :</h3-->
        <button type="submit" class="btn btn-primary btn-lg">Afficher une seul proposition</button>
    </form>
</body>


<script>
    function AccepterSuppression() {
        let result = confirm("Voulez-vous vraiment supprimer cette proposition ?");
        if (result){
            return true;
        } else {
            return false;
        }
    }
</script>
