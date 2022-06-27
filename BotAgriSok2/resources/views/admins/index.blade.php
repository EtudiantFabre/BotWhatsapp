<!--link rel="stylesheet" type="text/css" href="resources/css/table.css"-->
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
<body class="shadow p-3 mb-5 bg-body container rounded">
    <h1 class="text-center">Listes des Administrateurs</h1>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="table-secondary">Numéro Admins</th>
                    <th scope="col" class="table-secondary">Nom</th>
                    <th scope="col" class="table-secondary">Prénom</th>
                    <th scope="col" class="table-secondary">Tél</th>
                    <th scope="col" class="table-secondary">Numéro de la personne</th>
                    <th scope="col" class="bg-danger">Actions sur chaque ligne</th>
                </tr>
            </thead>
            @foreach($listeadmins as $admin)
                <tr>

                    <td>
                        {{$admin->num_admin}}
                    </td>
                    <td>
                        {{$admin->nom}}
                    </td>
                    <td>
                        {{$admin->prenom}}
                    </td>
                    <td>
                        {{$admin->tel}}
                    </td>
                    <td>
                        {{$admin->num_personne}}
                    </td>

                    <td>
                        <div class="d-flex dropdown mr-1">
                            <form action="{{route('admins.edit', $admin->num_admin)}}" method="get" style="">
                                <button type="submit" class="btn btn-outline-info">Modifier</button>
                                <!--input class="modifier" value="Modifier" type="submit"-->
                            </form>
                            <form action="{{route('admins.destroy', $admin->num_admin)}}" method="post" onsubmit="return AccepterSuppression()" style="">
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
    </div>
    <h2 class="text-center">Actions suplémentataire sur la base de donné :</h2>

    <div class="container text-center mr-1 d-flex dropdown">
        <form action="{{route('admins.create')}}" style="" class="text-center">
            <button type="submit" class="btn btn-outline-primary">Créer un administrateur</button>
            <!--input class="creer" value="Créer" type="submit"-->
        </form>
    
        <form action="{{--route('admins.show', $listeadmins[0])--}}" class="text-center" style="">
            <button type="submit" class="btn btn-outline-primary">Afficher un administrateur</button>
            <!--input class="afficher" value="Afficher un produit" type="submit"-->
        </form>
    </div>
    <div id="completerIns" class="invisible container rounded-pill p-3 mb-2 bg-success text-white">
        <span>
            <p class="font-weight-bold text-center">Merci pour la création de votre compte. Pour terminer la création du compte et recevoir des notifications, terminier 🕺🏽 <a href="https://t.me/AGRISOK_bot" class="text-decoration-none">ici.</a></p>
        </span>
    </div>
</body>

<script>
    function AccepterSuppression() {
        let result = confirm("Voulez-vous vraiment supprimer cette parcelle ?");
        if (result){
            return true;
        } else {
            return false;
        }
    }

    function EnvoyerNotification(){
        const conpleterInscription = document.getElementById('completerIns');
        if (getComputedStyle(conpleterInscription).display != "none"{
            conpleterInscription.style.display = "block";
        });
    }
</script>
@endsection