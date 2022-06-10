<body>
    <div><h2>Création d'une culture :</h2></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('cultures.store')}}" method="post">
        {{csrf_field()}}
        @method('post')
        <div>
            <label>Nom de la culture :</label>
            <td><input type="text" name="nom_culture" placeholder="culture"/></td>
        </div>
        <div>
            <label>Rendement de la culture (sac/heectar) :</label>
            <input type="text" name="rendement" required placeholder="rendement">
        </div>
        <div>
            <label>Densité par semestre de la culture :</label>
            <input type="text" name="densite_semestre" required placeholder="densité">
        </div>
        <div>
            <label>Fréquence d'arrosage (par mois) :</label>
            <table>
                <tr>
                    <br>
                    <label>{{__('Mois : ')}}</label>
                    <input type="text" name="mois" placeholder="mois"/>
                </tr>
            </table>
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Sauvegarder">
        </div>
    </form>
</body>
