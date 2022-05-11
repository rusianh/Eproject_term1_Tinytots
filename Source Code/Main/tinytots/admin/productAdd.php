<div class="product-form">
    <?php echo $error; ?>
    <?php echo $success; ?>
    <h2 style="font-weight: bold"><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;ADD A PRODUCT</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" name="name" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" class="form-control" id="" name="price" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" id="" name="status">
                <option>available</option>
                <option>sold out</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Categories</label>
            <select multiple class="form-control" id="" name="category">
                <?php
                if (!empty($dataCategory)) {
                    foreach ($dataCategory as $value) {
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
                        echo "<option>" . $value["Brand_Name"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" id="" rows="3" name="description"></textarea>
        </div>

        <div class="attribute">
            <p>Attribute</p>
            <div class="form-group">
                <label style="display: block" for="">Size&nbsp;</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="attribute[]" id="" value="S">
                    <label class="form-check-label" for="">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="M">
                    <label class="form-check-label" for="">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="L">
                    <label class="form-check-label" for="">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="XL">
                    <label class="form-check-label" for="">XL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="" name="attribute[]" value="XXL">
                    <label class="form-check-label" for="">XXL</label>
                </div>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;Other</span>
                <div class="col">
                    <input type="text" class="form-control" name="attribute[]" placeholder="">
                </div>

            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control-file" id="" name="image">
        </div>

        <button style="font-weight: bold; width: 20%; display: block; margin: 0 auto" type="submit" name="submit" value="submit" class="btn btn-primary">
            ADD PRODUCT
        </button>
        <button style="font-weight: bold; width: 20%; display: block; margin: 10px auto" type="button" onclick="window.open('productList.php','_self');" class="btn btn-danger">
            LIST PRODUCTS
        </button>

    </form>

</div>
