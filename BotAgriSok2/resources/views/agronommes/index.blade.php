@extends('layouts.app')
@section('content')
<style>
    /*table{
        border-collapse: collapse;
        margin-left: 14rem;
        text-align: center;
    }
    body{
        text-align: center;
    }
    td{
        border: 1px solid black;
        padding: 10px;
    }
    th{
        border: 1px solid black;
        padding: 10px;
    }
    form input, .creer {
        text-align: center;
        padding: 2px;
        width: auto;
        border-radius: 15px;
        background: #016ABC;
        color: #f7fafc;
        cursor: pointer;
        margin-top: -5px;
    }
    .supprimer{
        position: absolute;
        margin-top: -15px;
        margin-left: 70px;
    }
    .boutton{
        height: 20px;
    }
    h1 {
        text-align: center;
    }
    h2, h3 {
        text-align: center;
    }
    .creer{
        margin: auto;
        text-align: center;
        margin-left: 25rem;
    }
    .fleche{
        position: relative;
    }
    .fleche::before{
        content: '\27BB';
        font-size: 70px;
        color: #14e1ab;
        text-align: center;
        align-content: center;
        alignment: center;
        margin: auto;
        
        position: absolute;
        margin-left: 21rem;
        margin-top: 8px;
    }
    .modifier {
        position: absolute;
        margin-top: -15px;
    }*/
</style>
<body class="rounded container shadow p-3 mb-5 bg-body">
    <h1 class="text-center">Listes des Agronommes :</h1>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="table-secondary" >Numéro de l'agriculteur</th>
                    <th scope="col" class="table-secondary">Nom</th>
                    <th scope="col" class="table-secondary">Prénom</th>
                    <th scope="col" class="table-secondary">Tél</th>
                    <th scope="col" class="table-secondary">Niveau d'étude :</th>
                    <th scope="col" class="table-secondary">Numéro de la personne</th>
                    <th scope="col" class="bg-danger">Actions</th>
                </tr>
            </thead>

        @foreach($listeagronommes as $agronomme)
            <tr>

                <td>
                    {{$agronomme->num_agronomme}}
                </td>
                <td>
                    {{$agronomme->nom}}
                </td>
                <td>
                    {{$agronomme->prenom}}
                </td>
                <td>
                    {{$agronomme->tel}}
                </td>
                <td>
                    {{$agronomme->niveau_etude}}
                </td>
                <td>
                    {{$agronomme->num_personne}}
                </td>

                <td>
                    <div class="d-flex dropdown mr-1">
                        <form action="{{route('agronommes.edit', $agronomme->num_agronomme)}}" method="get" style="">
                            <button type="submit" class="btn btn-outline-info">Modifier</button>
                            <!--input class="modifier" value="Modifier" type="submit"-->
                        </form>
                        <form action="{{route('agronommes.destroy', $agronomme->num_agronomme)}}" method="post" onsubmit="return AccepterSuppression()" style="">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                            <!--input class="supprimer" value="Supprimer" type="submit"-->
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <h2 class="text-center">Actions suplémentataire sur la base de donné :</h2>

    <div class="container text-center mr-1 d-flex dropdown">
        <form action="{{route('agronommes.create')}}" style="" class="text-center">
            <button type="submit" class="btn btn-outline-primary">Créer un administrateur</button>
            <!--input class="creer" value="Créer" type="submit"-->
        </form>

        <form action="{{--route('agronommes.show', $listeagronommes[0])--}}" class="text-center" style="">
            <button type="submit" class="btn btn-outline-primary">Afficher un administrateur</button>
            <!--input class="afficher" value="Afficher un produit" type="submit"-->
        </form>
    </div>
</body>


<script>
    function AccepterSuppression() {
        let result = confirm("Voulez-vous vraiment supprimer cet agronomme ?");
        if (result){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
