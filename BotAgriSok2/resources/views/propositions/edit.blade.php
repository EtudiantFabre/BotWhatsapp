<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body class="bg-light">
    <h2 class="text-center">Modification d'une proposition :</h2>
    <div class="justify-content-center container bg-primary">
        <div class="bg-secondary">
            <form action="{{route('sauvegarderModification', $proposition->numProposition)}}" method="post">
                {{@csrf_field()}}

                <div>
                    <!--span><label>Date de la proposition :</label>
                    <td><input type="date" name="dateProposition" value="{{--$proposition->dateProposition--}}"/></td>
                    </span-->
                    <div class="input-group mb-3" style="width: 31rem">
                        <span class="input-group-text" id="basic-addon1">Date de la proposition :</span>
                        <input type="date" class="form-control" placeholder="{{$proposition->dateProposition}}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sélection de la culture :</label>
                        </div>

                        <select name="numCulture"  class="custom-select" style="width: 21rem" id="s-01">
                            <option selected>-- CULTURE --</option>
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
                </div>
                <div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sélection de l'agronomme :</label>
                        </div>
                        <select name="numAgronomme" style="width: 19rem" class="custom-select" aria-label=".form-select-lg example">
                            <option selected>-- AGRONOMME --</option>
                            <?php
                            $myPDO = new PDO('pgsql:host=localhost;dbname=botwhatsap', 'bot', 'bot');
                            $result = $myPDO->query('select * from agronommes');

                            foreach ($result as $unAgronomme){
                                //print_r($uneCulture['numCulture']);
                                //dd($uneCulture);
                                $texte = ' 👉️ ';
                                echo "<option value=".$unAgronomme['numAgronomme'].">".$unAgronomme['numAgronomme'].$texte.$unAgronomme['nom']."</option>";
                            }
                            ?>
                        </select>
                        <div class="input-group mb-8 d-grid gap-2 col-6 mx-auto ">
                            <button type="submit" class="btn btn-info" name="sauvegarder" >Sauvegarder les modifications</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
