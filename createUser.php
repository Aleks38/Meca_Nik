<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Création d'utilisateur</title>
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
                    <p>Pour ajouter un nouvelle utilisateur veuillez remplir le formulaire ci-dessous.</p>
                </div>

                <!-- champs de connextion -->
                <form action="" method="post" class="form-example" id="champsconnection">
                    <div class="form-example input row">
                        <div class="col">
                            <p class="text-end mb-0">Prénom :</p>
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="name" required>
                        </div>
                    </div>

                    <div class="form-example input row">
                        <div class="col">
                            <p class="text-end mb-0">Nom :</p>
                        </div>
                        <div class="col">
                            <input type="text" name="firstname" id="firstname" required>
                        </div>                        
                    </div>

                    <div class="form-example input row">
                        <div class="col">
                           <p class="text-end mb-0">Nom d'utilisateur :</p> 
                        </div>
                        <div class="col">
                            <input type="text" name="username" id="username" required>
                        </div>
                        
                    </div>

                    <div class="form-example input row">
                        <div class="col my-auto">
                            <p class="text-end">Rôle :</p>
                        </div>
                        <div class="col-6 px-1 mx-3">
                            <select name="idRole" class="form-select" required>
                                <option selected>Rôle</option>
                                <?php
                                    $sqlRequete1 = "SELECT idRole, nomRole FROM roles";
                                    $recipesStatement = $mysqlClient->prepare($sqlRequete1);
                                    $recipesStatement->execute();
                                    $recipes = $recipesStatement->fetchAll();
                                    foreach($recipes as $recipe)
                                    {
                                        ?>
                                            <option value="<?php echo $recipe['idRole']?>"><?php echo $recipe['nomRole']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

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
                        <input type="submit" value="Ajouter">
                    </div>

                    <?php 
                        if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["idRole"]))
                        {
                            $passHache = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);

                            $sqlRequete2 = 'Insert Into users(nom, prenom, userName, adresseMail, password, idRole)
                            Values (:name, :firstname, :username, :email, :password, :idRole)';

                            $recipesStatement2 = $mysqlClient->prepare($sqlRequete2);

                            $recipesStatement2->execute(array(':name' => $_POST['name'], ':firstname' => $_POST['firstname'], 
                            ':username' => $_POST['username'], ':email' => $_POST['email'], ':password' => $passHache, ':idRole' => $_POST['idRole']));
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