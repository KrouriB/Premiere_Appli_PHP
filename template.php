<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/50e50e8630.js" crossorigin="anonymous"></script>
    <title><?php echo $titre; ?></title>
</head>

<body>
    <header>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Panier</a></li>
            <li id="qttTotal">Récapitulatif du nombre de produit en panier : <span><?= qttTotal() ?></span></li>
        </ul>
    </header>
    <?php echo $content ; ?>
</body>

</html>