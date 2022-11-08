<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Méca_Nik</title>
</head>
<body>
    <?php include "index.php"; ?>
    <div class="contenuPage">        
        <?php
        //préparation et exécution de la requête 
            $query = $mysqlClient->prepare("SELECT nom, batiment, allee, rayon, rangee, seuilCritique, stock FROM produit");
            $query->execute();
        ?>
        <table class="tableauProduit">
            <thead>
                <tr>
                    <th class="tableauProduit">Nom </th>
                    <th class="tableauProduit">Bâtiment</th>
                    <th class="tableauProduit">Allée</th>
                    <th class="tableauProduit">Rayon</th>
                    <th class="tableauProduit">Rangée</th>
                    <th class="tableauProduit">Disponibilité</th>
                    <th class="tableauProduit">Stock</th>
                    <th class="tableauProduit">Seuil Critique</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $query->fetch(PDO::FETCH_ASSOC)) : ?><!-- boucle qui va parcourir la liste des produit-->
                    <!-- Fonction qui attribue une couleur en fonction du stock restant --->
                    <?php $qteRes= $row['stock'];
                        $color = 'white';//couleur de base: blanche 
                        if ($qteRes<10 or $qteRes<($row['seuilCritique']*0.5)){$color='red';}//si stock trop faible (<10 pièces) ou <50% du seuil critique: rouge
                        elseif ($qteRes>10 and $qteRes<($row['seuilCritique'])){$color='orange';}//si stock inférieur au seuil critique: orange
                        else {$color = 'green';} // si stock suppérieur au seuil critique: vert
                    ?> 

                <tr class="tableauProduit"><!-- Affichage du tableau ligne par ligne -->
                    <td class="tableauProduit" id="Titre"><?php echo htmlspecialchars($row['nom']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['batiment']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['allee']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['rayon']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['rangee']);?></td>
                    <td class="tableauProduit" style="background-color : <?= $color; ?>"></td> <!-- ne contient que la couleur associé au stock et au seuil critique -->
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['stock']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['seuilCritique']);?></td>
                </tr> 
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>