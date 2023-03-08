<?php
session_start();
ob_start();
require "fonction.php";
?>

<div id="detailWrap">
    <figure>
        <img src="img/<?= $_SESSION['products'][$_GET['id']]['image'] ?>" alt="image du produit <?= $_SESSION['products'][$_GET['id']]['name'] ?>">
    </figure>
    <h1><?= $_SESSION['products'][$_GET['id']]['name'] ?></h1>
    <span><?= $_SESSION['products'][$_GET['id']]['price'] ?>€</span>
    <p><?= $_SESSION['products'][$_GET['id']]['resume'] ?></p>
</div>

<?php
    $content = ob_get_clean();
    $titre=$_SESSION['products'][$_GET['id']]['name'];
    require "template.php";
?>