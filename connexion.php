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
        <link rel="stylesheet" href="style.css">

        <?php 
            include "sqlConnect.php";
        ?>

    <!-- gros carrée avec info et champs de connextion -->
    <div class="header-full container-fluide row ">
        <div class="center-div col-4 px-0">
            <div class="mx-3 my-3 center-div">
                <!-- info -->
                <div id="paragraphe">
                    <p>Pour accéder aux fonctionnalités qui vous sont prédisposés, veuillez vous conncter à l'aide du formulaire ci-dessous.</p>
                </div>

                <!-- champs de connextion -->
                <form action="" method="post" class="form-example" id="champsconnection">

                    <!-- <div class="form-example input row">
                        <div class="col">
                           <p class="text-end mb-0">Nom d'utilisateur :</p> 
                        </div>
                        <div class="col">
                            <input type="text" name="username" id="username" required>
                        </div>
                    </div> -->

                    <div class="form-example input row">
                        <div class="col">
                            <p class="text-end mb-0">Adresse mail :</p>
                        </div>
                        <div class="col">
                            <input type="text" name="email" id="email" required>
                        </div>
                    </div>

                    <div class="form-example input row">
                        <div class="col">
                            <p class="text-end mb-0">Mot de passe :</p>
                        </div>
                        <div class="col">
                           <input type="password" name="password" id="password" required> 
                        </div>
                    </div>

                    <div class="form-example champs">
                        <input type="submit" value="Connexion">
                    </div>    
                    <?php 
                        if (isset($_POST['email']))
                        {
                            
                            $adresseVerif = $_POST['email'];
                            $sqlRequete1 = "SELECT * FROM users where adresseMail = '$adresseVerif'";
                            $recipesStatement = $mysqlClient->prepare($sqlRequete1);
                            $recipesStatement->execute();
                            $recipes = $recipesStatement->fetchAll();
                            if(count($recipes) > 0){
                                foreach ($recipes as $recepe)
                                {
                                    if($_POST['email'] == $recepe['adresseMail'] and password_verify($_POST['password'], $recepe['password']))
                                    {
                                        ?>
                                            <div class="col-10 mx-auto">
                                                <h3 class="username">
                                                    <span class="badge badge-warning"><?php echo "Bonjour ", $recepe['nom'], " ", $recepe['prenom'],"."?></span>
                                                </h3>
                                            </div>
                                        <?php
                                    }
                                    else{
                                        echo false ;
                                    }
                                }
                            }
                            else
                            {
                                ?>
                                    <div class="col-10 mx-auto">
                                        <p class="erreurConnexion">Votre identifiant et le mot de passe ne correspondent à aucun compte existant. Veuillez réessayer.</p>
                                    </div>
                                <?php
                            }  
                        }
                    ?>               
               </form>
            </div>
        </div>
        <!-- fin du champs de connextion -->
    </div>
    <!-- fin gros carrée avec info et champs de connextion -->
    
    </body>
</html>