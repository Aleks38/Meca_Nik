<?php
    include 'sqlConnect.php'
?>
<?php 
    $sqlRequeteTest = "Select batiment from produit where nom = 'Pneus'; ";
    $recipesStatement = $mysqlClient->prepare($sqlRequeteTest);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();

    foreach ($recipes as $recipe)
    {
        ?>
        <p><?php echo $recipe['batiment'];?></p>
        <?php
    }
?>
