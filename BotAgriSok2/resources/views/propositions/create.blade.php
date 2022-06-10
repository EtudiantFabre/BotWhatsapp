<body>
    <div><h2>Création d'une propositions :</h2></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('sauvgarderProposition')}}" method="post">
        {{csrf_field()}}
        @method('post')
        <div>
            <span><label>Date de la proposition :</label>
            <td><input type="date" name="date_proposition" placeholder="date"/></td>
            </span>
        </div>
        <div>
            <label>Sélection de la culture :</label>
            <select name="numCulture" style="width: 200px">
                <option>-- Culture --</option>
                <?php
                $myPDO = new PDO('pgsql:host=localhost;dbname=botwhatsap', 'bot', 'bot');
                $result = $myPDO->query('select * from cultures');

                foreach ($result as $uneCulture){
                    $texte = ' 👉️ ';
                    echo "<option value=".$uneCulture['numCulture'].">".$uneCulture['numCulture'].$texte.$uneCulture['nomCulture']."</option>";

                }
                ?>
            </select>
        </div>
        <div>
            <label>Sélection de l'agronomme :</label>
            <select name="numAgronomme" style="width: 200px">
                <option>-- Agronomme --</option>
                <?php
                $myPDO = new PDO('pgsql:host=localhost;dbname=botwhatsap', 'bot', 'bot');
                $result = $myPDO->query('select * from agronommes');

                foreach ($result as $unAgronomme){
                    //print_r($uneCulture['numCulture']);
                    //dd($uneCulture);
                    $texte = ' 👉️ correspond à ';
                    echo "<option value=".$unAgronomme['numAgronomme'].">".$unAgronomme['numAgronomme'].$texte.$unAgronomme['nom']."</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" name="sauvegarder" value="Enregistrer le produit">
        </div>
    </form>
</body>
