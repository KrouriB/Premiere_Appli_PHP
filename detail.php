<?php
session_start();
ob_start();
require "fonction.php";
?>



<?php
    $content = ob_get_clean();
    $titre=$_SESSION['products'][$_GET['id']]['name'];
    require "template.php";
?>