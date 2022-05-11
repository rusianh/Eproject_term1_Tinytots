<div class="shopping-cart">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table" id="listCart">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Total</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $number = 0;
                                $subtotal = 0;
                                $cart = [];
                                $total = 0;

                                ?>
                                <?php if (isset($_SESSION["cart"])) : ?>
                                    <?php $cart = $_SESSION["cart"]; ?>
                                    <?php foreach ($cart as $key => $data) : ?>
                                        <?php $number += (int)$data['number'];
                                        $total = ((int)$data['number'] * $data['price']);
                                        $subtotal += $total;
                                        ?>
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="<?php echo $data['image']; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0">
                                                            <a href="#" class="text-dark d-inline-block align-middle"><?php echo $data['name']; ?></a>
                                                        </h5>
                                                        <span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $categoryIdName[$data['categoryId']]; ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle">
                                                <strong>$ <?php echo $data["price"]; ?></strong></td>
                                            <td class="border-0 align-middle">
                                                <input type="number" id="num<?php echo $key; ?>" onclick="updateCart(<?php echo $key; ?>);" class="form-control quantity-input" style="width:70px;" value="<?php echo $data['number'] ?>">
                                            </td>
                                            <td class="border-0 align-middle">
                                                <strong>$ <?php echo $total; ?></strong></td>
                                            <td class="border-0 align-middle">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt" onclick="deleteCart(<?php echo $key; ?>);"></i>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row py-5 p-4 bg-white rounded shadow-sm">
    <div class="col-lg-6" style="display: block;margin: 0 auto;">
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary</div>
        <div class="p-4">
            <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order
                                                                                                         Subtotal </strong><strong>$ <?php echo $subtotal ?></strong>
                </li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping
                                                                                                         and
                                                                                                         handling</strong><strong>$  <?php if($subtotal > 0) echo "10"; else echo 0; ?> </strong>
                </li>
                <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted">Tax</strong><strong>$ <?php echo (int)$tax = $subtotal * 0.1; ?></strong>
                </li>
                <li class="d-flex justify-content-between py-3 border-bottom">
                    <strong class="text-muted">Total</strong>
                    <h5 class="font-weight-bold">$ <?php if($subtotal>0) echo($subtotal + $tax + 10); else echo 0; ?></h5>
                </li>
            </ul>
            <?php if(isset($_SESSION['total'] ) && $_SESSION['total'] > 0): ?>
            <a href="order.php" class="btn btn-dark rounded-pill py-2 btn-block">Check Out</a>
            <?php endif; ?>
            <a href="index.php?page=product" class="btn btn-dark rounded-pill py-2 btn-block">Keep Buying</a>
        </div>
    </div>
</div>


