<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout Produit</title>
</head>

<body>
    <div id="indexWrap">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">
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
            <p>
                <input type="submit" name="submit" value="Ajouter le produit" id="submitbtn">
            </p>
        </form>
        <a href="recap.php">Récapitulatif des produits</a>
    </div>
</body>

</html>