<?php
session_start();
if (isset($_GET['action'])){
    switch($_GET['action']){
        case "add":
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // FILTER_FLAG_ALLOW_FRACTION -> permet l'utilisation de . ou , pour les nombre décimaux
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                if ($name && $price && $qtt) {
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION['products'][] = $product;
                }
            }
            break;
        case "clear":
            unset($_SESSION['products']);
            break;
    }
}
header("Location:index.php"); // redirection vers index.php si on va sur ce fichier
die; // forece la fin d'un script