<?php
    session_start();
    ob_start();
    require("functions.php");

$title = "Recapitulatif des produits";

// ================Pour le titre si je veux ajouter une couche de complexité
// ob_start();
// echo "Récapitulatif des produits";
// $title = ob_get_clean();
//================ commencer le ob_start du content:
// ob_start();
?>

<!-- ===========Recapitulatif========== -->
    <nav class="d-flex justify-content-center">
        <button class='btn btn-sm btn-success d-flex justify-content-center align-item-center m-3' onclick="window.location.href = 'index.php';">Page principale</button>
    </nav>
<?php
    factureProduit();

    $content = ob_get_clean();
    require_once "template.php";
?>