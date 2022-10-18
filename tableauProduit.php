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
    <?php include "ConnectToBdd.php"; include "index.php"; ?>
    <div class="contenuPage">        
        <?php
            $query = $db->prepare("SELECT nom, batiment, allee, rayon, rangee, seuilCritique, stock FROM produit");
            $query->execute();
            
            /* Récupération de toutes les lignes de la table produit 
            $result = $query->fetchAll();*/
        ?>
        <table class="tableauProduit">
            <thead>
                <tr>
                    <th>Nom </th>
                    <th>Bâtiment</th>
                    <th>Allée</th>
                    <th>Rayon</th>
                    <th>Rangée</th>
                    <th>Disponibilité</th>
                    <th>Stock</th>
                    <th>Seuil Critique</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
                    <!-- Fonction qui attribue une couleur en fonction du stock restant --->
                    <?php $qteRes= $row['stock'];
                        $color = 'brown';
                        if ($qteRes<10){$color='red';}
                        elseif ($qteRes>10 and $qteRes<($row['seuilCritique'])){$color='orange';}
                        else {$color = 'green';} ?>

                <tr class="tableauProduit">
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['nom']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['batiment']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['allee']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['rayon']);?></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['rangee']);?></td>
                    <td class="tableauProduit" style="background-color : <?= $color; ?>"></td>
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['stock']);?></td> <!-- A modifier valeur fixes -->
                    <td class="tableauProduit"><?php echo htmlspecialchars($row['seuilCritique']);?></td>
                </tr> 
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>