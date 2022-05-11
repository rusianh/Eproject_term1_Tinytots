<?php

if ($page == "add") {
    if ($id == 'success') {
        $success = " <div class=\"alert alert-success\"  role=\"alert\"> Add product successfully !!</div>";
    }

    if (isset($_POST['submit'])) {
        $error = "";
        $success = "";
        // thông tin
        $name = isset($_POST['name']) ? trim($_POST['name']) : "";
        $status = isset($_POST['status']) ? trim($_POST['status']) : "";
        $category = isset($_POST['category']) ? trim($_POST['category']) : "";
        $brand = isset($_POST['brand']) ? trim($_POST['brand']) : "";
        $description = isset($_POST['description']) ? trim($_POST['description']) : "";
        $price = isset($_POST['price']) ? trim($_POST['price']) : "";
        $attribute = [];

        if (!empty($_POST["attribute"])) {
            foreach ($_POST["attribute"] as $value) {
                if (!empty($value)) {
                    $attribute[] = $value;
                }
            }
        }


        $flag = true;
        $validate = new validate();
        if ($validate->checkEmpty([$name, $status, $category, $brand, $description, $price]) || empty($attribute)) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please fill in all fields !!</div>';
        } else if (!$validate->CheckProductName($name)) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Product name already exists !! </div>';
        } else if (empty($_FILES['image']['type'])) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please upload your images !! </div>';
        } else {
            $files = new uploadFile();
            $size = 10;
            $upload = $files->UploadFile("image", "../assets/img/productShow/", 1, $size, "submit");
            $image = json_decode($upload);
            if (!$image->kq) {
                $flag = false;
                $error = '<div class="alert alert-danger"> <strong>Oops!</strong> image must be jpeg, png, gif and jpg and under ' . $size . ' MB  </div>';
            }
        }
        if ($flag) {


            $link = substr($image->file, 3);
            $productId = (int)getName::getName("ProductID", "product");
            $products->setProduct($productId, $name, $description, $status, $brandNameId[$brand], $categoryNameId[$category], " ", $price);

            foreach ($attribute as $value) {
                $attributeId = (int)getName::getName("AttributeID", "attribute");
                $stmt = ConnectDb::connect()->prepare("call proc_attribute_insert(?,?)");
                $stmt->execute([$attributeId, $value]);
                $conn = null;
                $productAttributes->setProductAttribute($productId, $attributeId);

            }
            $products->editProductImage($productId, $link);
            header("location: ./productAddEdit.php?page=add&status=success");


        }


    }
}
