<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit</title>
</head>

<body>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du Produit :
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du Produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité du Produit :
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
    <a href="recap.php">Récap</a>
</body>

</html>