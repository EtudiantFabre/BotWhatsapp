<style>
    body {
        /*text-align: center;*/
        background: #dadfe7;
    }
</style>
<body>
<div><h2>Modification d'une culture :</h2></div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('cultures.update', $culture)}}" method="post">
    {{csrf_field()}}
    @method('put')
    {{--$admin--}}

    <div>
        <label>Nom de la culture :</label>
        <input type="text" name="nom_culture" value="{{$culture->nom_culture}}">
    </div>
    <div>
        <label>Rendement :</label>
        <input type="text" name="rendement" value="{{$culture->rendement}}">
    </div>
    <div>
        <label>Densité par semestre :</label>
        <input type="text" name="densite_semestre" value="{{$culture->densite_semestre}}">
    </div>
    <div>
        <label>Fréquence d'arrosage :</label>
        <table>
            <tr>
                <td><label>{{__('Mois : ')}}</label></td>
                <td><input type="text" name="mois" value="{{$culture->frequence_arrosage['mois']}}"/></td>
            </tr>
        </table>
    </div>
    <div>
        <input type="submit" name="sauvegarder" value="Sauvegarder">
    </div>
</form>
</body>
