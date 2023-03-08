<?php
session_start();
ob_start();
require "fonction.php";
?>

<div id="recapWrap">
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo getMessages();
        echo "<p>Aucun produit en session ...</p>";
    } else {
    ?>
        <?= getMessages() ?>
        <h1>Votre Panier:</h1>
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
                        <td><a href="detail.php?id=<?= $index ?>"><?= $product['name'] ?></a></td>
                        <td><?= number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€" ?></td>
                        <td class="qttLigne"><div class="btnPlusMoins"><a href="traitement.php?action=more&id=<?= $index ?>" class="btn plus">+</a><a href="traitement.php?action=less&id=<?= $index ?>" class="btn moins">-</a></div><?= $product['qtt'] ?></td>
                        <td class="unTotal"><?= number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€" ?></td>                        
                        <td class="colSuppr"><a href="traitement.php?action=delete&id=<?= $index ?>"><i class="fa-solid fa-delete-left"></i></a></td>
                    </tr>
                <?php
                    $totalGeneral += $product['total'];
                }
                ?>
                <tr>
                    <td colspan=4>Total général : </td>
                    <td id="caseTotalVal"><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€" ?></strong></td>
                    <td class="colSuppr"><a href="traitement.php?action=clear"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            </tbody>
        </table>
        <span id="recapSpan">Le nombre d'objet en session actuellement est de <?= compteObjetSession() ?>.</span>
    <?php
    }
    ?>
</div>

<?php
    $content = ob_get_clean();
    $titre="Panier";
    require "template.php";
?>