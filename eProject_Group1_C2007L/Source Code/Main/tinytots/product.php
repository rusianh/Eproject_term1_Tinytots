<ul class="list-group">

    <li class="list-group-item text-center" style="border-bottom: 2px solid rgba(146,144,234,0.61) ;">
        <i class="fas fa-tshirt" style="font-size: 22px;width: 30px;color: rgb(241,130,0);"></i><a href="index.php?page=product&category=1" style="font-family: Alatsi, sans-serif;font-size: 18px;">Fashions</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fas fa-baby" style="font-size: 22px;width: 30px;color: rgb(241,130,0);"></i><a href="index.php?page=product&category=2" style="font-family: Alatsi, sans-serif;font-size: 18px;">Baby
                                                                                                                                                                                                   Care</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fas fa-baseball-ball" style="font-size: 22px;width: 30px;color: rgb(241,130,0);"></i><a href="index.php?page=product&category=3" style="font-family: Alatsi, sans-serif;font-size: 18px;">Toys</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fas fa-briefcase-medical" style="font-size: 22px;width: 30px;color: rgb(241,130,0);"></i><a href="index.php?page=product&category=4" style="font-family: Alatsi, sans-serif;font-size: 18px;">Wellness
                                                                                                                                                                                                                &
                                                                                                                                                                                                                Hygiene</a>
    </li>
</ul>
<div class="container">

    <?php

    if (isset($_GET['page']) && $_GET['page'] == "product") {
        $id = (isset($_GET['category'])) ? $_GET['category'] : null;
        $productId = isset($_GET['productid']) ? $_GET['productid'] : null;
        $datas = [];
        if ($id == null) {
            $datas = $dataProduct;
        } else  {
            $datas = $products->getProductAllCategory($id);
        }
        if($productId != null ){
            $datas = $products ->getProductId($productId);
        }

        include_once "./includes/productData.php";
    }
    ?>
</div>




