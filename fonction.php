<?php


function qttTotal(){
    $qttProduitTotal = 0;
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        $qttProduitTotal = 0;
    } else {
        foreach ($_SESSION['products'] as $index => $product){
            $qttProduitTotal += $product['qtt'];
        }
    }
    return $qttProduitTotal;
}

function compteObjetSession(){
    $valCountSession = 0;
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        $valCountSession = 0;
    } else {
        $valCountSession = count($_SESSION['products']);
    }
    return $valCountSession;
}