<?php

function getTotalArticles() {
    $nbArticles = 0;
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "";
    }else {
        foreach($_SESSION['products'] as $index => $product){
            $nbArticles+= $product['qtt'];
        }
        return $nbArticles."<br>";
    }
}

function factureProduit() {
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p class='alert alert-warning text-center'>Aucun produit en session...</p>";
    } else {
        echo "<div class='container mt-4'>",
                "<table class='table table-striped'>",
                    "<thead class='thead-dark'>",
                        "<tr class='table table-dark'>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Actions</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
        $totalGeneral = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>",
                        "<a href='traitement.php?action=up-qtt&id=$index' class='btn btn-sm btn-success'>+</a> ",
                        "<a href='traitement.php?action=down-qtt&id=$index' class='btn btn-sm btn-warning'>-</a> ",
                        "<a href='traitement.php?action=delete&id=$index' class='btn btn-sm btn-danger'>Supprimer</a>",
                    "</td>",
                 "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "</tbody>",
            "<tfoot>",
                "<tr>",
                    "<td colspan='4' class='text-right font-weight-bold'>Total général :</td>",
                    "<td colspan='2'><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "<tr>",
                    "<td colspan='4' class='text-right font-weight-bold'>Nombre d'articles :</td>",
                    "<td colspan='2'><strong>" . getTotalArticles() . "</strong></td>",
                "</tr>",
                "<tr>",
                    "<td colspan='6' class='text-center'>",
                        "<a href='traitement.php?action=clear' class='btn btn-danger btn-block'>Vider le panier</a>",
                    "</td>",
                "</tr>",
            "</tfoot>",
            "</table>",
        "</div>";
    }
}

function showProductAdd() {
    $nameArticle = "";
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "";
    }else {
        foreach($_SESSION['products'] as $index => $product){
            $nameArticle = $_SESSION['products'][$index]['name'];
        }
        echo $_SESSION['products'][$index]['qtt']." ".$nameArticle." ont été ajouté dans le panier";
    }
}

?>