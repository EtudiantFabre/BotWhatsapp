<body>
<div><h2>Modification d'une parcelle :</h2></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('parcelles.update', $parcelle)}}" method="post">
        {{csrf_field()}}
        @method('put')
        <div>
            <span><label>Nature de la parcelle :</label>
            <td><input type="text" name="nature" value="{{$parcelle->nature}}"/></td>
            </span>
        </div>
        <div>
            <label>Surface de la parcelle (em m²) :</label>
            <input type="text" name="surface" required value="{{$parcelle->surface}}">
        </div>
        <div>
            <label>Localisation (Région et Ville):</label>
            <table>
                <tr>
                    <br>
                    <label>{{__('Région : ')}}</label>
                    <span><select name="region" style="width: 200px">
                            <option>Région des Savanes</option>
                            <option>Région de la Kara</option>
                            <option>Région Central</option>
                            <option>Région des Plateaux</option>
                            <option>Région Maritime</option>
                        </select>
                    </span>
                </tr>
                <tr>
                    <td><label>{{__('Ville : ')}}</label></td>
                    <td><input type="text" name="ville" value="{{$parcelle->localisation['ville']}}"/></td>
                </tr>
            </table>
        </div>
        <div>
            <label>Sélection de la culture :</label>

            <!--input type="text" name="culture" required placeholder="surface"-->
            <select name="num_culture" style="width: 200px">
                <option>-- Culture --</option>
                <?php
                $myPDO = new PDO('pgsql:host=localhost;dbname=botwhatsap', 'bot', 'bot');
                $result = $myPDO->query('select * from cultures');

                foreach ($result as $uneCulture){
                    //print_r($uneCulture['num_culture']);
                    //dd($uneCulture);
                    $texte = ' 👉️ correspond à ';
                    echo "<option value=".$uneCulture['num_culture'].">".$uneCulture['num_culture'].$texte.$uneCulture['nom_culture']."</option>";

                }
                ?>
            </select>
            <br>
            <label>Sélection de l'agriculteur :</label>
            <select name="num_agriculteur" style="width: 200px">
                <option>-- Agriculteur --</option>
                <?php
                $myPDO = new PDO('pgsql:host=localhost;dbname=botwhatsap', 'bot', 'bot');
                $result = $myPDO->query('select * from agriculteurs');

                foreach ($result as $unAgriculteur){
                    //print_r($uneCulture['num_culture']);
                    //dd($uneCulture);
                    $texte = ' 👉️ correspond à ';
                    echo "<option value=".$unAgriculteur['num_agriculteur'].">".$unAgriculteur['num_agriculteur'].$texte.$unAgriculteur['nom']."</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Enregistrer modification">
        </div>
    </form>
</body>
