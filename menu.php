<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="tableau.css">
    </head>
    <body>
        <?php include "index.php"; ?>

        <div class="contenuPage">  
            <!-- Partie Ligne de recherche -->
            <section>
                <div id="choix" class="row">
                    <form method="post" action="menu.php">
                        <input type="text" name="identifiant" id="identifiant" class="col-sm-2 choixspe" placeholder="Nom">
                        <select id="batiment" name="batiment" class="col-sm-2 choixspe">
                            <option value="" selected>Batiment-</option>
                            <option value="a">Batiment A</option>
                            <option value="b">Batiment B</option>
                            <option value="c">Batiment C</option>
                            <option value="d">Batiment D</option>
                            <option value="e">Batiment E</option>
                            <option value="f">Batiment F</option>
                            <option value="g">Batiment G</option>
                            <option value="h">Batiment H</option>
                        </select>
                        <select id="allee" name="allee" class="col-sm-2 choixspe">
                            <option value="" selected>Allée-</option>
                            <option value="1">Allée 1</option>
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
                            <option value="" selected>Rangée-</option>
                            <option value="Y">Rangée Y</option>
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
                        <input class="col-sm-2 choixspe" name="recherche" type="submit" value="Rechercher"/>
                </form>
                </div>            
            </section>

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


                if(isset($_POST['recherche'])){

                    $recipesStatement = $pdo->prepare('SELECT * FROM produit WHERE 
                                                            nom LIKE "%'.$_POST['identifiant'].'%" 
                                                        AND batiment LIKE "%'.$_POST['batiment'].'%"
                                                        AND allee LIKE "%'.$_POST['allee'].'%"
                                                        AND rangee LIKE "%'.$_POST['rangee'].'%"
                                                        ');

                }else{


                    //Si pas de requete de filtres alors...

                    // On récupère tout le contenu de la table recipes
                    $sqlQuery = 'SELECT * FROM produit';
                    $recipesStatement = $pdo->prepare($sqlQuery);


                }


            $recipesStatement->execute();
            $recipes = $recipesStatement->fetchAll();

            // On affiche chaque recette une à une
            foreach ($recipes as $recipe) {
            ?>

                <?php 
                $qteRes= $recipe['stock'];
                $color = 'white';//couleur de base: blanche 
                $dispo = 'Disponible';
                if ($qteRes<10 or $qteRes<($recipe['seuilCritique']*0.5)){$color='danger'; $dispo="Critique";}//si stock trop faible (<10 pièces) ou <50% du seuil critique: rouge
                elseif ($qteRes>10 and $qteRes<($recipe['seuilCritique'])){$color='warning'; $dispo="Moyen";}//si stock inférieur au seuil critique: orange
                else {$color = 'success'; $dispo="Disponible";} // si stock suppérieur au seuil critique: vert
                ?>                

                <div id="ligne" class="row">
                    <div class="col-sm-3 positioncb"><img src="codebarre.png" class="codebarre"></a></div>
                    <div class="lignass align-self-center"><?php echo $recipe['nom']; ?></div>
                    <div class="lignass align-self-center"><?php echo $recipe['batiment']; ?></div>
                    <div class="lignass align-self-center"><?php echo $recipe['allee']; ?></div>
                    <div class="lignass align-self-center"><?php echo $recipe['rangee']; ?></div>
                    <div class="lignette"><span class="badge badge-<?php echo $color?>"><?php echo $dispo; ?></span></div>
                    <div class="ligneron"><?php echo $recipe['stock']; ?></div>
                </div>
            <?php
            }

            ?>

            
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>