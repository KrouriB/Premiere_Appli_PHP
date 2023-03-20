<?php
session_start();
if (isset($_GET['action'])){
    switch($_GET['action']){
        case "add":
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // FILTER_FLAG_ALLOW_FRACTION -> permet l'utilisation de . ou , pour les nombre décimaux
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                $resume = filter_input(INPUT_POST, "resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if(isset($_FILES['image'])){
                    $tmpName = $_FILES['image']['tmp_name'];
                    $imageName = $_FILES['image']['name'];
                    $error = $_FILES['image']['error'];
                    $tabExtension = explode('.',$imageName);//découpe du nom de fichier et son extension en deux objet d'un tableau (suppression du point)
                    $extension = strtolower(end($tabExtension)); // objet a la fin du tableau rendu en miniscule
                    $autoriser = ['jpg','jpeg','png','webm','jfif']; // extension autorisé lors du comparatif
                    if(in_array($extension, $autoriser) && $error == 0){
                        $nomUnique = uniqid('', true);
                        $nomFichier = $nomUnique.".".$extension;
                        move_uploaded_file($tmpName,'img/'.$nomFichier);
                    }
                    else{
                        $_SESSION["message"] = "Il y a une erreure dans le fichier ou l'extension n'est pas celle désiré";
                    }
                }
                if ($name && $price && $qtt && $resume) {
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt,
                        "resume" => $resume,
                        "imageName" => $imageName,
                        "tmpName" => $tmpName,
                        "image" => $nomFichier
                    ];
                    $_SESSION['products'][] = $product;
                    $_SESSION["message"] = "Produit enregistré avec succès !";
                }
                else{
                    $_SESSION["message"] = "Vous ne pouvez pas enregistré ce produit !";
                }
            }
            break;
        case "clear":
            unset($_SESSION['products']);
            $_SESSION["message"] = "Le panier a été vidé !";
            header("Location:recap.php");
            die();
            break;
        case "delete":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                $_SESSION["message"] = "Le Produit ".$_SESSION['products'][$_GET['id']]['name']." a été supprimé !";
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
                    $_SESSION["message"] = "Le Produit  ".$_SESSION['products'][$_GET['id']]['name']."  a été supprimé !";
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

// TODO: supprimer les image a la suppression d'un produit