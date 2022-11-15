<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style1.css">

    
    <?php include 'index.php';?>

    <div class="contenuPage section2 my-6">
        <!-- Partie Ligne de recherche -->
            <div  class="row align-items-center m-3">
                <div id="choix" class="col-9 ms-auto">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" name="identifiant" id="identifiant" class="test" placeholder="Nom" required>
                        </div>
                        <div class="col-2">
                            <select id="batiment" name="batiment" class="">
                                <option value="a" selected>Batiment A</option>
                                <option value="b">Batiment B</option>
                                <option value="c">Batiment C</option>
                                <option value="d">Batiment D</option>
                                <option value="e">Batiment E</option>
                                <option value="f">Batiment F</option>
                                <option value="g">Batiment G</option>
                                <option value="h">Batiment H</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select id="allee" name="allee" class="">
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
                        </div>
                        <div class="col-2">
                            <select id="rangee" name="rangee" class="">
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
                        </div>
                        <div class="col-2">
                            <label for="identifiant" class="">Disponibilité</label>
                        </div>
                        <div class="col-2">
                            <label for="identifiant" class="">En stock</label>
                        </div>
                    </div>
                </div>
            </div>            

        <!-- Partie ligne résultat -->

        <?php 
        $host = 'localhost';
        $dbname = 'entrepotmecanik';
        $username = 'root';
        try {
            // se connecter à mysql
            $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
        }

        // On récupère tout le contenu de la table recipes
        $sqlQuery = 'SELECT * FROM produit';
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        // On affiche chaque recette une à une
        foreach ($recipes as $recipe) {
        ?>

            <?php 
                $qteRes= $recipe['stock'];
                $color = 'white';//couleur de base: blanche 
                $dispo = 'Disponible';
                //si stock trop faible (<10 pièces) ou <50% du seuil critique: rouge
                if ($qteRes<10 or $qteRes<($recipe['seuilCritique']*0.5))
                {
                    $color='danger'; $dispo="Critique";
                }
                //si stock inférieur au seuil critique: orange
                elseif ($qteRes>10 and $qteRes<($recipe['seuilCritique']))
                {
                    $color='warning'; $dispo="Médium";
                }
                // si stock suppérieur au seuil critique: vert
                else {
                    $color = 'success'; $dispo="Disponible";
                }
            ?>                
            <div id="ligne" class="row m-3">
                <div class="col-3 positioncb"><img src="codebarre.png" class="codebarre"></a></div>
                <div class="col-9 align-self-center">
                    <div class="row ">
                        <div class="col-2 align-self-center"><?php echo $recipe['nom']; ?></div>
                        <div class="col-2 align-self-center"><?php echo $recipe['batiment']; ?></div>
                        <div class="col-2 align-self-center"><?php echo $recipe['allee']; ?></div>
                        <div class="col-2 align-self-center"><?php echo $recipe['rangee']; ?></div>
                        <div class="col-2 align-self-center"><span class="badge text-bg-<?php echo $color?>"><?php echo $dispo; ?></span></div>
                        <div class="col-2 align-self-center"><?php echo $recipe['stock']; ?></div>
                    </div>
                </div>
            </div>
            
        <?php
        }
        ?>

        
    </div>

    </body>
</html>