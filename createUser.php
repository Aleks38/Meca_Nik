<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Connexion</title>
    </head>
    <body>
    <?php 
        include "sqlConnect.php";
    ?>

    <!-- gros carrée avec info et champs de connextion -->
    <div id="connect">
        <div id="blabla" class="center-div">
            <!-- info -->
            <div id="paragraphe">
                <p>Pour ajouter un nouvelle utilisateur veuillez remplir le formulaire ci-dessous.</p>
            </div>

            <!-- champs de connextion -->
            <form action="" method="post" class="form-example" id="champsconnection">
                <div class="form-example input">
                    <label for="firstname">Prénom :</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-example input">
                    <label for="name">Nom :</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>

                <div class="form-example input">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="form-example input">
                    <label for="role">Rôle :</label>
                    <select name="idRole" class="form-select mt-3" required>
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

                <div class="form-example input">
                    <label for="email">Adresse mail :</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="form-example input">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-example champs">
                    <input type="submit" value="Ajouter">
                </div>

                <?php 
                    $passHache = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);

                    $sqlRequete2 = 'Insert Into users(nom, prenom, userName, adresseMail, password, idRole)
                    Values (:name, :firstname, :username, :email, :password, :idRole)';

                    $recipesStatement2 = $mysqlClient->prepare($sqlRequete2);

                    $recipesStatement2->execute(array(':name' => $_POST['name'], ':firstname' => $_POST['firstname'], 
                    ':username' => $_POST['username'], ':email' => $_POST['email'], ':password' => $passHache, ':idRole' => $_POST['idRole']));
                ?>

            </form>
        </div>
        <!-- fin du champs de connextion -->
    </div>
    <!-- fin gros carrée avec info et champs de connextion -->
    
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>