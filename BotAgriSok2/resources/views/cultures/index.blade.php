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
    <h1>Listes des Cultures :</h1>
    <table>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Rendement</th>
            <th>Densité par semestre</th>
            <th>Fréquence arrosage(par mois) :</th>
            <th>Actions</th>
        </tr>

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

                <td class="boutton">
                    <form action="{{route('cultures.edit', $culture->num_culture)}}" method="get" style="...">
                        <input class="modifier" value="Modifier" type="submit">
                    </form>
                    <form action="{{route('cultures.destroy', $culture->num_culture)}}" method="post" onsubmit="return AccepterSuppression()" style="...">
                        @csrf
                        @method('delete')
                        <input class="supprimer" value="Supprimer" type="submit">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h2>Actions suplementataire sur la base de donné :</h2>

    <form class="fleche" action="{{route('cultures.create')}}" method="get" style="...">
        <!--h3>Créer un nouveau Administrateur :</h3-->
        <button class="creer" type="submit">Créer une CULTURE</button>
    </form>

    <form class="fleche" action="{{--route('admins.show', $listeadmins[0])--}}" method="get" style="...">
        <!--h3>Afficher un Administrateur :</h3-->
        <button class="creer" type="submit">Afficher une seul culture</button>
    </form>
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
