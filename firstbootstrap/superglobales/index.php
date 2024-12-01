<?php
    session_start();
    ob_start();
    require("functions.php");

$title = "Ajout de produit";
// ================Pour le titre si je veux ajouter une couche de complexité
// ob_start();
// echo "Ajout de produit";
// $title = ob_get_clean();
//================ commencer le ob_start du content:
// ob_start();
?>

<!--FORM-->
<nav class="col-lg-12 d-flex justify-content-center">
        <button class="btn btn-sm btn-success d-flex justify-content-center align-item-center m-3" onclick="window.location.href='recap.php';">Recap</button>
</nav>
<div class="container border p-3 rounded d-flex justify-content-center flex-column align-items-center gap-3">
    <h1 class="fst-italic text-center">Ajouter un produit</h1>
    <form action="traitement.php?action=add" method="post" class="w-50">
        <div class="mb-3">
            <label for="productName" class="form-label">Nom du produit :</label>
            <input type="text" name="name" id="productName" class="form-control" placeholder="Entrez le nom du produit" required>
        </div>    
        <div class="mb-3">
            <label for="productPrice" class="form-label">Prix du produit :</label>
            <input type="number" name="price" step="any" id="productPrice" class="form-control" placeholder="Entrez le prix du produit" required>
        </div>
        <div class="mb-3">
            <label for="productQtt" class="form-label">Combien voulez vous ?</label>
            <input type="number" name="qtt" id="productQtt" class="form-control" placeholder="Entrez la quantité" required>
        </div>

        <p class="d-flex justify-content-center">
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
    <p>
        Articles dans le panier: 
        <?php
        echo getTotalArticles();
        echo showProductAdd();
        ?>  
    </p>
</div>


<?php
$content = ob_get_clean();

require_once "template.php"; 
?>