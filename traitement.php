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
            header("Location:recap.php");
            die();
            break;
        case "delete":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                unset($_SESSION['products'][$_GET['id']]);
            }
            header("Location:recap.php");
            die();
        case "more":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                $_SESSION['products'][$_GET['id']]['qtt'] += 1;
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt']*$_SESSION['products'][$_GET['id']]['price'];
            }
            header("Location:recap.php");
            die();
        case "less":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                if ($_SESSION['products'][$_GET['id']]['qtt'] == 1){
                    unset($_SESSION['products'][$_GET['id']]);
                }
                else{
                    $_SESSION['products'][$_GET['id']]['qtt'] -= 1;
                    $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt']*$_SESSION['products'][$_GET['id']]['price'];
                }
            }
            header("Location:recap.php");
            die();
    }
}
header("Location:index.php"); // redirection vers index.php si on va sur ce fichier
die; // forece la fin d'un script