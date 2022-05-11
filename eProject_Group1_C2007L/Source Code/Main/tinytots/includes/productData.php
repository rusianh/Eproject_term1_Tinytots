<div class="row product-list dev">
    <?php
    if (!empty($datas)) :?>

        <?php foreach ($datas as $data) : ?>
            <?php if ($data['Product_status'] == "available"): ?>

                <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">
                    <div class="product-container">
                        <div class="row">
                            <div class="col-md-12">
                                <a class="product-image" href="<?php echo $data['ProductImage_link'] ?>"><img src="<?php echo $data['ProductImage_link'] ?>"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <h3 style="font-size: 15px; font-weight: bold"><?php echo $data["Product_Name"] ?></h3>
                            </div>
                            <div class="col-4" onclick="compareProduct(<?php echo $data['ProductID'] ?>)" id="load">
                                <a class="small-text" style="cursor: pointer">compare </a>
                            </div>
                        </div>
                        <div class="product-rating"><span><?php echo $data["Product_status"] ?></span></div>
                        <div class="row">
                            <div class="col-12">
                                <p class="product-description"><?php echo $data['Description_Product'] ?></p>

                                <p class="product-description">
                                    <?php if ($categoryIdName[(int)$data['CategoryID']] == "Fashions"): ?>
                                        <i style="font-weight: bold">Size: </i> <?php endif; ?>

                                    <?php foreach ($productAttribute[$data["ProductID"]] as $data1): ?>
                                        <i style="font-size: 13px; font-weight: bold"><?php echo $data1 . " "; ?> </i>
                                    <?php endforeach; ?>

                                </p>

                                <div class="row">

                                    <div class="col-6">
                                        <button class="btn btn-light" type="button" onclick="cart(<?php echo $data['ProductID'] ?>);"></i>&nbsp;Add
                                                                                                                                          to
                                                                                                                                          cart
                                        </button>

                                    </div>

                                    <div class="col-6">
                                        <p class="product-price">$ <?php echo $data["Product_Price"] ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

