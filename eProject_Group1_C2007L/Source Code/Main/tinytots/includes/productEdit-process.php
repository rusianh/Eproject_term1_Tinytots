<?php

if ($page == "edit") {

    if ($status == "success") {
        $success = " <div class=\"alert alert-success\"  role=\"alert\"> Edit product successfully !!</div>";
    } else
        if (!empty($id)) {
            $dataEdit = $products->getProductId($id);
            if (array_key_exists(0, $dataEdit)) {
                $data = $dataEdit[0];
            } else header("location: ../error.php");
        }

    if (isset($_POST['submit1'])) {
        $flag = true;
        if (empty($_FILES['image']['type'])) {
            $flag = false;
            $error = '<div class="alert alert-danger"> <strong>Oops!</strong> Please upload your images !! </div>';
        } else {
            $files = new uploadFile();
            $size = 10;
            $upload = $files->UploadFile("image", "../assets/img/productShow/", 1, $size, "submit1");
            $image = json_decode($upload);
            $link = substr($image->file, 3);

            if (!$image->kq) {
                $flag = false;
                $error = '<div class="alert alert-danger"> <strong>Oops!</strong> image must be jpeg, png, gif and jpg and under ' . $size . ' MB  </div>';
            }
        }
        if ($flag) {
            $products->editProductImage($id, $link);
            header("location: ./productAddEdit.php?page=edit&id=$id&status=success");
        }
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
        // ảnh

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
        }
        if ($flag) {
            $productAttributes->deleteProductAttribute($id);
            foreach ($productAttributeID[$id] as $value) {
                $stmt = ConnectDb::connect()->prepare("call proc_attibute_delete(?)");
                $stmt->execute([$value]);
                $conn = null;
            }
            $products->editProduct($id, $name, $categoryNameId[$category], $description, $status, $brandNameId[$brand], $data['ProductImage_link'], $price);
            foreach ($attribute as $value) {
                $attributeId = (int)getName::getName("AttributeID", "attribute");
                $stmt = ConnectDb::connect()->prepare("call proc_attribute_insert(?,?)");
                $stmt->execute([$attributeId, $value]);
                $conn = null;
                $productAttributes->setProductAttribute($id, $attributeId);
            }
            header("location: ./productAddEdit.php?page=edit&id=$id&status=success");
        }

    }
}
