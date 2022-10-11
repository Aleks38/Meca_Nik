<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div id="section" class="col-sm-12">
        <!-- Partie Ligne de recherche -->
        <section>
            <div id="choix" class="row">
                <p>
                <input type="text" name="identifiant" id="identifiant" class="col-sm-2 choixspe" placeholder="Nom" required>
                <select id="batiment" name="batiment" class="col-sm-2 choixspe">
                    <option value="a" selected>Batiment A</option>
                    <option value="b">Batiment B</option>
                    <option value="c">Batiment C</option>
                    <option value="d">Batiment D</option>
                    <option value="e">Batiment E</option>
                    <option value="f">Batiment F</option>
                    <option value="g">Batiment G</option>
                    <option value="h">Batiment H</option>
                </select>
                <select id="allee" name="allee" class="col-sm-2 choixspe">
                    <option value="1" selected>Allée 1</option>
                    <option value="2">Allée 2</option>
                    <option value="3">Allée 3</option>
                    <option value="4">Allée 4</option>
                    <option value="5">Allée 5</option>
                    <option value="6">Allée 6</option>
                    <option value="7">Allée 7</option>
                    <option value="8">Allée 8</option>
                    <option value="9">Allée 9</option>
                </select>
                <select id="rangee" name="rangee" class="col-sm-2 choixspe">
                    <option value="Y" selected>Rangée Y</option>
                    <option value="U">Rangée U</option>
                    <option value="V">Rangée V</option>
                    <option value="P">Rangée P</option>
                    <option value="O">Rangée O</option>
                    <option value="I">Rangée I</option>
                    <option value="J">Rangée J</option>
                    <option value="K">Rangée K</option>
                    <option value="L">Rangée L</option>
                    <option value="M">Rangée M</option>
                    <option value="G">Rangée G</option>
                    <option value="Q">Rangée Q</option>
                    <option value="W">Rangée W</option>
                    <option value="T">Rangée T</option>
                    <option value="X">Rangée X</option>
                    <option value="S">Rangée S</option>
                    <option value="E">Rangée E</option>
                </select>
                <label for="identifiant" class="col-sm-2 choixspe">Disponibilité</label>
                <label for="identifiant" class="col-sm-1.5 choixspe">En stock</label>
                </p>
            </div>            
        </section>

        <!-- Partie ligne résultat -->
        <div id="ligne" class="row">
            <div class="col-sm-3 positioncb"><img src="codebarre.png" class="codebarre"></a></div>
            <div class="lignass">Vis à bois</div>
            <div class="lignass">Batiment A</div>
            <div class="lignass">Allée 8</div>
            <div class="lignass">Rangée P</div>
            <div class="lignette">Orange</div>
            <div class="ligneron">95</div>
        </div>

        <div id="ligne" class="row">
            <div class="col-sm-3"><img src="codebarre.png" class="codebarre"></div>
            <div class="lignass">Pneu 16 pouce</div>
            <div class="lignass">Batiment E</div>
            <div class="lignass">Allée 5</div>
            <div class="lignass">Rangée W</div>
            <div class="lignette">Vert</div>
            <div class="ligneron">142</div>
        </div>

        <div id="ligne" class="row">
            <div class="col-sm-3"><img src="codebarre.png" class="codebarre"></div>
            <div class="lignass">Marteau Américain</div>
            <div class="lignass">Batiment C</div>
            <div class="lignass">Allée 7</div>
            <div class="lignass">Rangée L</div>
            <div class="lignette">Rouge</div>
            <div class="ligneron">8</div>
        </div>

        <div id="ligne" class="row">
            <div class="col-sm-3"><img src="codebarre.png" class="codebarre"></div>
            <div class="lignass">Disqueuse</div>
            <div class="lignass">Batiment G</div>
            <div class="lignass">Allee 1</div>
            <div class="lignass">Rangée X</div>
            <div class="lignette">Vert</div>
            <div class="ligneron">68</div>
        </div>

        <div id="ligne" class="row">
            <div class="col-sm-3"><img src="codebarre.png" class="codebarre"></div>
            <div class="lignass">Mètre</div>
            <div class="lignass">Batiment D</div>
            <div class="lignass">Allee 9</div>
            <div class="lignass">Rangée O</div>
            <div class="lignette">Orange</div>
            <div class="ligneron">37</div>
        </div>

        
    </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>