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
<body>
    <div class="shadow p-3 mb-5 bg-body container rounded">
        <h1 class="text-center">Listes des Cultures :</h1>
        <div class="">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="table-secondary">Numéro</th>
                        <th scope="col" class="table-secondary">Nom</th>
                        <th scope="col" class="table-secondary">Rendement</th>
                        <th scope="col" class="table-secondary">Densité par semestre</th>
                        <th scope="col" class="table-secondary">Fréquence arrosage(par mois) :</th>
                        <th scope="col" class="bg-danger">Actions</th>
                    </tr>
                </thead>
            @foreach($listecultures as $culture)
                <tr>

                    <td>
                        {{$culture->num_culture}}
                    </td>
                    <td>
                        {{$culture->nom_culture}}
                    </td>
                    <td>
                        {{$culture->rendement}}
                    </td>
                    <td>
                        {{$culture->densite_semestre}}
                    </td>
                    <td>
                        {{$culture->frequence_arrosage['mois']}}
                    </td>

                    <td>
                        <div class="d-flex dropdown mr-1">
                            <form action="{{route('cultures.edit', $culture->num_culture)}}" method="get" style="">
                                <button type="submit" class="btn btn-outline-info">Modifier</button>
                                <!--input class="modifier" value="Modifier" type="submit"-->
                            </form>
                            <form action="{{route('cultures.destroy', $culture->num_culture)}}" method="post" onsubmit="return AccepterSuppression()" style="">
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
        <h2>Actions suplementataire sur la base de donné :</h2>

        <div class="container text-center mr-1 d-flex dropdown">
            <form action="{{route('cultures.create')}}" style="" class="text-center">
                <button type="submit" class="btn btn-outline-primary">Créer une culture</button>
                <!--input class="creer" value="Créer" type="submit"-->
            </form>

            <form action="{{--route('admins.show', $listeadmins[0])--}}" class="text-center" style="">
                <button type="submit" class="btn btn-outline-primary">Afficher une culture</button>
                <!--input class="afficher" value="Afficher un produit" type="submit"-->
            </form>
        </div>
    </div>
</body>


<script>
    function AccepterSuppression() {
        let result = confirm("Voulez-vous vraiment supprimer cette culture ?");
        if (result){
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection