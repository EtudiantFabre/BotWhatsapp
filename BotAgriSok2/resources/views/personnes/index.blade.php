<style>
    table{
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
        /*position: absolute;
        margin-top: -15px;
        margin-left: 70px;*/
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
        /*
        position: absolute;
        margin-left: 21rem;
        margin-top: 8px;*/
    }
    .modifier {
        /*position: absolute;
        margin-top: -15px;*/
    }
</style>
<body>
<h1>Listes des Agriculteurs :</h1>
<table>
    <tr>
        <th>Numéro de la personne</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Tél</th>
        <th>Actions</th>
    </tr>

    @foreach($listepersonnes as $personne)
        <tr>

            <td>
                {{$personne->num_personne}}
            </td>
            <td>
                {{$personne->nom}}
            </td>
            <td>
                {{$personne->prenom}}
            </td>
            <td>
                {{$personne->tel}}
            </td>
            <td class="boutton">
                <form action="{{route('personnes.edit', $personne->num_personne)}}" method="get" style="...">
                    <input class="modifier" value="Modifier" type="submit">
                </form>
                <form action="{{route('personnes.destroy', $personne->num_personne)}}" method="post" onsubmit="return AccepterSuppression()" style="...">
                    @csrf
                    @method('delete')
                    <input class="supprimer" value="Supprimer" type="submit">
                </form>
            </td>
        </tr>
    @endforeach
</table>
<h2>Actions suplementataire sur la base de donné :</h2>

<form class="fleche" action="{{route('personnes.create')}}" method="get" style="...">
    <!--h3>Créer un nouveau Administrateur :</h3-->
    <button class="creer" type="submit">Créer une PERSONNE</button>
</form>

<form class="fleche" action="{{--route('personnes.show', $listepersonne[0])--}}" method="get" style="...">
    <!--h3>Afficher un Administrateur :</h3-->
    <button class="creer" type="submit">Afficher une seul personne</button>
</form>
</body>


<script>
    function AccepterSuppression() {
        let result = confirm("Voulez-vous vraiment supprimer cette personne ?");
        if (result){
            return true;
        } else {
            return false;
        }
    }
</script>
