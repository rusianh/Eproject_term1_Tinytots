<?php include "./includes/list-brand.php" ?>
<div class="container">
    <?php
    if (isset($_GET['page']) && $_GET['page'] == "brand") {
        $id = (isset($_GET['brandid'])) ? $_GET['brandid'] : null;
        $datas = [];
        if ($id == null) {
            $datas = $dataProduct;
        } else {
            $datas = $products->getProductAllBrand($id);
        }
        include "./includes/productData.php";
    }
    ?>
</div>


