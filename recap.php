<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>

<body>
    <div id="recapWrap">
        <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p>Aucun produit en session ...</p>";
        } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalGeneral = 0;
                    foreach ($_SESSION['products'] as $index => $product) {
                    ?>
                        <tr>
                            <td class="tdIndex"><?= $index ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€" ?></td>
                            <td><?= $product['qtt'] ?></td>
                            <td class="unTotal"><?= number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€" ?></td>
                        </tr>
                    <?php
                        $totalGeneral += $product['total'];
                    }
                    ?>
                    <tr>
                        <td colspan=4>Total général : </td>
                        <td id="caseTotalVal"><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€" ?></strong></td>
                        <td><a href=""></a></td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        ?>
        <a href="index.php">Principal</a>
        <span id=recapSpan>Le nombre d'objet en session actuellement est de <?= count($_SESSION['products']) ?>.</span>
    </div>
</body>

</html>