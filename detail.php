<?php
session_start();
ob_start();
require "fonction.php";
?>

<div id="detailWrap">
    <figure id="imageDetail">
        <img src="img/<?= $_SESSION['products'][$_GET['id']]['image'] ?>" alt="image du produit <?= $_SESSION['products'][$_GET['id']]['name'] ?>">
    </figure>
    <div id=partDroite>
        <div id=infoPrincipal>
            <h1><?= $_SESSION['products'][$_GET['id']]['name'] ?></h1>
            <span><?= number_format($_SESSION['products'][$_GET['id']]['price'], 2, ",", "&nbsp;") . "€" ?></span>
        </div>
        <p><?= $_SESSION['products'][$_GET['id']]['resume'] ?></p>
    </div>
</div>

<?php
    $content = ob_get_clean();
    $titre=$_SESSION['products'][$_GET['id']]['name'];
    require "template.php";
?>