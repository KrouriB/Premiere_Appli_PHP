<?php
session_start();
ob_start();
require "fonction.php";
?>
<div id="indexWrap">
    <?= getMessages() ?>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=add" method="post" enctype="multipart/form-data">
        <p class="info">
            <label for="name">
                Nom du Produit :
            </label>
            <input type="text" name="name" id="name">
        </p>
        <p class="info">
            <label for="price">
                Prix du Produit :
            </label>
            <input type="number" step="any" name="price" id="price">
        </p>
        <p class="info">
            <label for="qtt">
                Quantité du Produit :
            </label>
            <input type="number" name="qtt" value="1" id="qtt">
        </p>
        <p id="textareaResume">
            <label for="resume">
                Une Description :
            </label>
            <textarea name="resume" id="resume"></textarea>
        </p>
        <p class="info">
            <label for="image">
                Une Image :
            </label>
            <input type="file" name="image" id="image">
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit" id="submitbtn">
        </p>
    </form>
    <span id="indexSpan">Le nombre d'objet en session actuellement est de <?= compteObjetSession() ?>.</span>
</div>
<?php
    $content = ob_get_clean();
    $titre="Ajout produit";
    require "template.php";
?>