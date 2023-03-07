<?php ob_start(); ?>

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
                        <td class="qttLigne"><div class="btnPlusMoins"><a href="traitement.php?action=more&id=<?= $index ?>" class="btn plus">+</a><a href="traitement.php?action=less&id=<?= $index ?>" class="btn moins">-</a></div><?= $product['qtt'] ?></td>
                        <td class="unTotal"><?= number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€" ?></td>                        
                        <td class="colSuppr"><a href="traitement.php?action=delete&id=<?= $index ?>"><i class="fa-solid fa-delete-left"></i></a></td>'
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
        <span id="recapSpan">Le nombre d'objet en session actuellement est de <?= count($_SESSION['products']) ?>.</span>
    <?php
    }
    ?>
    <a href="index.php" id="btnIndex">Principal</a>
</div>

<?php
    $content = ob_get_clean();
    $titre="Panier";
    require "template.php";
?>