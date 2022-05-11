<div class="product-form">
    <?php echo $error; ?>
    <?php echo $success; ?>
    <h2>EDIT PRODUCT</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" name="name" value="<?php if (!empty($data)) echo $data['Product_Name'] ?>" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" class="form-control" id="" value="<?php if (!empty($data)) echo $data['Product_Price'] ?>" name="price" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" id="" name="status">
                <option <?php if (!empty($data) && $data['Product_status'] == "available") echo "selected"; ?> >
                    available
                </option>
                <option <?php if (!empty($data) && $data['Product_status'] == "sold out") echo "selected"; ?> >sold
                                                                                                               out
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Categories</label>
            <select multiple class="form-control" id="" name="category">
                <?php
                if (!empty($dataCategory)) {
                    foreach ($dataCategory as $value) {
                        if ($value["Name_Category"] == $categoryIdName[$data['CategoryID']])
                            echo "<option selected>" . $value["Name_Category"] . "</option>";
                        else
                            echo "<option>" . $value["Name_Category"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Brands</label>
            <select multiple class="form-control" id="" name="brand">
                <?php
                if (!empty($dataBrand)) {
                    foreach ($dataBrand as $value) {
                        if ($value["Brand_Name"] == $brandIdName[$data['BrandID']])
                            echo "<option selected>" . $value["Brand_Name"] . "</option>";
                        else
                            echo "<option>" . $value["Brand_Name"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" id="" rows="3" name="description"><?php if (!empty($data)) echo $data['Description_Product'] ?></textarea>
        </div>

        <div class="attribute">
            <p>Attribute</p>
            <div class="form-group">
                <label style="display: block" for="">Size&nbsp;</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="attribute[]" id="" value="S" <?php if (isset($productAttribute[$id]) && in_array("S", $productAttribute[$id])) echo "checked"; ?>>
                    <label class="form-check-label" for="">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="M"<?php if (isset($productAttribute[$id]) && in_array("M", $productAttribute[$id])) echo "checked"; ?>>
                    <label class="form-check-label" for="">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="L" <?php if (isset($productAttribute[$id]) && in_array("L", $productAttribute[$id])) echo "checked"; ?>>
                    <label class="form-check-label" for="">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="XL"<?php if (isset($productAttribute[$id]) && in_array("XL", $productAttribute[$id])) echo "checked"; ?>>
                    <label class="form-check-label" for="">XL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="XXL"<?php if (isset($productAttribute[$id]) && in_array("XXL", $productAttribute[$id])) echo "checked"; ?>>
                    <label class="form-check-label" for="">XXL</label>
                </div>
            </div>
            <?php
            $arr = [];
            if (isset($productAttribute[$id])) {
                foreach ($productAttribute[$id] as $value) {
                    if ($value != "S" && $value != "M" && $value != "L" && $value != "XL" && $value != "XXL") {
                        $arr[] = $value;
                    }
                }
            }
            ?>
            <div class="row">
                <?php if (!empty($arr)): ?>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Other</span>
                    <?php foreach ($arr as $value): ?>
                        <div class="col">
                            <input type="text" class="form-control" name="attribute[]" value="<?php echo $value; ?>" placeholder="">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;Other</span>
                    <div class="col">
                        <input type="text" class="form-control" name="attribute[]" placeholder="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control-file" id="" name="image">
        </div>

        <button style="font-weight: bold; width: 20%; display: block; margin: 0 auto" type="submit" name="submit" value="submit" class="btn btn-primary">
            EDIT INFO
        </button>
        <button style="font-weight: bold; width: 20%; display: block; margin: 10px auto" type="submit1" name="submit1" value="submit" class="btn btn-dark">
            EDIT IMAGE
        </button>
        <button style="font-weight: bold; width: 20%; display: block; margin: 10px auto" type="button" class="btn btn-danger" onclick="window.open('productList.php','_self');">
            LIST PRODUCTS
        </button>

    </form>

</div>
