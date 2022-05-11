--  ADMIN
use
    tinytots;
--  1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_admin_insert(
    IN UserName_Ip varchar(50),
    IN Password_Ip varchar(200),
    IN Name_Admin_Ip varchar(50))
BEGIN
    INSERT INTO Admins(UserName, Password, Name_Admin)
    VALUES (UserName_Ip, Password_Ip, Name_Admin_Ip);
END
//
delimiter //;


-- 2.Update Password (OK)
delimiter //
//
CREATE PROCEDURE proc_admin_update(
    IN UserName_Ip varchar(50),
    IN Password_Ip varchar(200))
BEGIN
    UPDATE Admins
    SET Password = Password_Ip
    WHERE UserName = UserName_Ip;
END
//
delimiter //;


-- 3.Select theo UserName (OK)
delimiter //
//
CREATE PROCEDURE proc_admin_selectName(
    IN UserName_Ip varchar(50))
BEGIN
    SELECT *
    FROM Admins
    WHERE UserName = UserName_Ip;
END
//
delimiter //;


-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

-- CATEGORY
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_category_insert(
    IN Name_Category_Ip varchar(50))
BEGIN
    INSERT INTO Category(Name_Category)
    VALUES (Name_Category_Ip);
END
//
delimiter //;


-- 2.Update (OK)
delimiter //
//
CREATE PROCEDURE proc_category_update(
    IN Category_ID int,
    IN Name_Category_Ip varchar(50)
)
BEGIN
    UPDATE Category
    SET Name_Category = Name_Category_Ip
    WHERE CategoryID = Category_ID;
END
//
delimiter //;


-- 3.Select theo ID (OK)
delimiter //
//
CREATE PROCEDURE proc_category_selectID(
    IN Category_ID int)
BEGIN
    SELECT Name_Category, CategoryID
    FROM Category
    WHERE CategoryID = Category_ID;
END
//
delimiter //;

--  proc_category_selectID("CTG34567");

-- 4.Select theo Name_Category (OK)
delimiter // //
//
CREATE PROCEDURE proc_category_selectName(
    IN Name_Category_Ip varchar(50))
BEGIN
    SELECT CategoryID, Name_Category
    FROM Category
    WHERE Name_Category = Name_Category_Ip;
END
//
delimiter //;

-- select all hạng mục sản phẩm
delimiter //
//
CREATE PROCEDURE proc_category_selectAll(
)
BEGIN
    SELECT CategoryID, Name_Category
    FROM Category;

END
//
delimiter //;
# xóa category
delimiter //
//
CREATE PROCEDURE proc_category_delete(
    in id int
)
BEGIN
    delete from category where CategoryID = id;

END
//

--  proc_category_selectName("Toy");

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

-- BRAND
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_brand_insert(
    IN Brand_Name_Ip varchar(50)
)
BEGIN
    INSERT INTO Brand(Brand_Name)
    VALUES (Brand_Name_Ip);
END
//
delimiter //;


-- 2.Update (OK)
delimiter //
//
CREATE PROCEDURE proc_brand_update(
    IN Brand_ID int,
    IN Brand_Name_Ip varchar(50)
)
BEGIN
    UPDATE Brand
    SET Brand_Name = Brand_Name_Ip

    WHERE BrandID = Brand_ID;
END
//
delimiter //;

delimiter //
//
CREATE PROCEDURE proc_brand_selectName(
    IN Brand_Name_Ip varchar(50)
)
BEGIN
    select * from brand where Brand_Name = Brand_Name_Ip;
END
//
delimiter //;
# xóa brand
delimiter //
//
CREATE PROCEDURE proc_brand_delete(
    IN id int
)
BEGIN
    delete from brand where BrandID = id;
END
//
delimiter //;


-- select all brand sản phẩm
delimiter //
//
CREATE PROCEDURE proc_brand_selectAll(
)
BEGIN
    SELECT BrandID, Brand_Name
    FROM brand;

END
//
delimiter //;
# chọn brand theo id
delimiter //
//
CREATE PROCEDURE proc_brand_selectId(
    In id int
)
BEGIN
    SELECT BrandID, Brand_Name
    FROM brand
    where BrandID = id;

END
//
delimiter //;
--  proc_brand_selectName("Boo");

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

-- ATTRIBUTE
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_attribute_insert(
    in AttributeID_ip int,
    IN Attribute_Name_Ip varchar(50))
BEGIN
    INSERT INTO Attribute(AttributeID, Attribute_Name)
    VALUES (AttributeID_ip, Attribute_Name_Ip);
END
//
delimiter //;


-- 2.Update (OK)
delimiter //
//
CREATE PROCEDURE proc_attribute_update(
    IN Attribute_ID int,
    IN Attribute_Name_Ip varchar(50))
BEGIN
    UPDATE Attribute
    SET Attribute_Name = Attribute_Name_Ip
    WHERE AttributeID = Attribute_ID;
END
//
delimiter //;


-- 3.Select theo ID (OK)
delimiter //
//
CREATE PROCEDURE proc_attribute_selectID(
    IN Attribute_ID int)

BEGIN
    SELECT Attribute_Name
    FROM Attribute
    WHERE AttributeID = Attribute_ID;
END
//
delimiter //;
-- 4. Select toàn bộ attribute của sp
delimiter //
//
CREATE PROCEDURE proc_attribute_selectAll(
)
BEGIN
    SELECT Attribute_Name
    FROM Attribute;

END
//
delimiter //;
# xóa attribute
delimiter //
//
CREATE PROCEDURE proc_attibute_delete(
    in id int
)

BEGIN

    delete from attribute where AttributeID = id;

END
//
delimiter //;


-- PRODUCT_ATTRIBUTE
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_productAttribute_insert(
    IN Product_ID int,
    IN Attribute_ID int)

BEGIN
    INSERT INTO Product_Attribute(ProductID, AttributeID)
    VALUES (Product_ID, Attribute_ID);
END
//
delimiter //;


-- 2.Update theo ProductID (OK)
delimiter //
//
CREATE PROCEDURE proc_productAttribute_updateAttributeID(
    IN Product_ID int,
    IN Attribute_ID int)
BEGIN
    UPDATE Product_Attribute
    SET AttributeID = Attribute_ID
    WHERE ProductID = Product_ID;
END
//
delimiter //;

--  proc_productAttribute_updateAttributeID("PRO12345","ATB12345");

-- 3.Update theo AttributeID (OK)
delimiter //
//
CREATE PROCEDURE proc_productAttribute_updateProductID(
    IN Attribute_ID int,
    IN Product_ID int)
BEGIN
    UPDATE Product_Attribute
    SET ProductID = Product_ID
    WHERE AttributeID = Attribute_ID;
END
//
delimiter //;

-- 4. xóa attribute theo product id

delimiter //
//
CREATE PROCEDURE proc_productAttribute_delete(
    IN Product_ID int)
BEGIN
    delete from product_attribute where ProductID = Product_ID;
END
//
delimiter //;


-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

-- PRODUCT
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_product_insert(
    IN ProductID_ip int,
    IN Product_Name_Ip varchar(50),
    IN CategoryID_Ip int,
    IN BrandID_Ip int,
    IN Product_status_Ip varchar(20),
    IN Description_Product_Ip varchar(200),
    IN Product_Price_Ip float,
    IN ProductImage_Link_Ip text)
BEGIN
    INSERT INTO `product`
    (`ProductID`,
     `Product_Name`,
     `CategoryID`,
     `Description_Product`,
     `Product_status`,
     `BrandID`,
     `ProductImage_link`,
     `Product_Price`)
    VALUES (ProductID_ip,
            Product_Name_Ip,
            CategoryID_Ip,
            Description_Product_Ip,
            Product_status_Ip,
            BrandID_Ip,
            ProductImage_Link_Ip,
            Product_Price_Ip);


END
//
delimiter //;

delimiter //
//
CREATE PROCEDURE proc_product_selectName(
    IN name varchar(200))
BEGIN
    select Product_Name, ProductID from product where Product_Name = name;
END
//
delimiter //;

delimiter //
//
CREATE PROCEDURE proc_product_selectAll()
BEGIN
    select * from product;
END
//
delimiter //;


-- Chỉnh sửa bảng product

delimiter //
//
CREATE PROCEDURE proc_product_edit(
    IN id int, in productName varchar(50), in categoryId_ip int,
    in dcp text, in productStatus varchar(20), in brandid_ip int,
    in link text, in price float
)
BEGIN
    update `product`
    SET `Product_Name`        = productName,
        `CategoryID`          = categoryId_ip,
        `Description_Product` = dcp,
        `Product_status`      = productStatus,
        `BrandID`             = brandid_ip,
        `ProductImage_link`   = link,
        `Product_Price`       = price
    WHERE `ProductID` = id;

END;
//
delimiter //;

# sủa hình ảnh
DELIMITER
//
CREATE PROCEDURE proc_product_updateImage(
    In ProductId_ip int,
    in link text
)

BEGIN
    update product
    set ProductImage_link = link
    WHERE ProductID = ProductId_ip;

END
//
DELIMITER ;

# xóa bản product
DELIMITER
//
CREATE PROCEDURE proc_product_delete(
    In ProductId_ip int
)

BEGIN
    delete from product where ProductID = ProductId_ip;

END
//
DELIMITER ;

-- lấy hết dữ liệu bảng product theo productId
delimiter //
//
CREATE PROCEDURE proc_product_selectAll_productId(
    In ProductId_ip int
)

BEGIN
    SELECT *
    FROM PRODUCT
    WHERE ProductID = ProductId_ip;

END
//
delimiter //;

-- lấy attribute của sản phẩm

delimiter //
//
CREATE PROCEDURE proc_product_selectAll_Attribute(
)

BEGIN
    select b.ProductID, a.Attribute_Name, a.AttributeID
    from attribute a,
         product b,
         product_attribute c
    where a.AttributeID = c.AttributeID
      and b.ProductID = c.ProductID;

END
//
delimiter //;

-- lấy attribute của sản phẩm theo productID
delimiter //
//
CREATE PROCEDURE proc_product_selectProductID_Attribute(
    in idProduct int
)

BEGIN
    select b.ProductID, a.Attribute_Name
    from attribute a,
         product b,
         product_attribute c
    where a.AttributeID = c.AttributeID
      and b.ProductID = c.ProductID
      and c.ProductID = idProduct;

END
//
delimiter //;


-- lấy dữ liệu product -----------------
-- lấy hết dữ liệu bảng product
DELIMITER
//
CREATE PROCEDURE proc_product_selectAll()
BEGIN
    SELECT * FROM PRODUCT ;

END
//
DELIMITER ;

-- lấy hết dữ liệu bảng product theo brand
DELIMITER
//
CREATE PROCEDURE proc_product_selectAll_Brand(
    In BrandId_ip int
)

BEGIN
    SELECT *
    FROM PRODUCT
    WHERE BrandID = BrandId_ip;

END
//
DELIMITER ;

-- lấy hết dữ liệu bảng product theo category
DELIMITER
//
CREATE PROCEDURE proc_product_selectAll_Category(
    In CategoryId_ip int
)

BEGIN
    SELECT *
    FROM PRODUCT
    WHERE CategoryID = CategoryId_ip;

END
//
DELIMITER ;

-- lấy hết dữ liệu bảng product theo productId
DELIMITER
//
CREATE PROCEDURE proc_product_selectAll_productId(
    In ProductId_ip int
)

BEGIN
    SELECT *
    FROM PRODUCT
    WHERE ProductID = ProductId_ip;

END
//
DELIMITER ;
-- láy productid ban product
DELIMITER
//
CREATE PROCEDURE proc_product_selectID(
)

BEGIN
    SELECT ProductID
    FROM PRODUCT;


END
//
DELIMITER ;


-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --


-- ORDERS
-- 1.thêm đơn đặt hàng (OK)
delimiter //
//
CREATE PROCEDURE proc_orders_insert(
    In Id int,
    IN CustomerCode_Ip int)
BEGIN
    INSERT
    INTO `orders`
    (`OrderID`,
     `CustomerCode`)
    VALUES (Id,
            CustomerCode_Ip);

END
//
delimiter //;
-- chọn đơn hàng theo hàng theo id
delimiter //
//
CREATE PROCEDURE proc_orders_selectID(
    IN Order_ID int
)
BEGIN
    select * from orders where OrderID = Order_ID;
END
//
delimiter //;

-- thông tin đơn hàng
delimiter //
//
CREATE PROCEDURE proc_ordersCustomer_selectAll(
)
BEGIN
    select a.OrderID, b.Order_Name, b.Order_Phone, b.Order_Address
    from orders a,
         customer b
    where a.CustomerCode = b.CustomerCode;
END
//
delimiter //;


-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

-- ORDERDETAIL
-- 1.Insert (OK)
delimiter //
//
CREATE PROCEDURE proc_orderdetail_insert(
    IN Order_ID int,
    IN Product_ID int,
    IN Quantity_Ip INT)
BEGIN
    INSERT INTO OrderDetail(OrderID, ProductID, Quantity)
    VALUES (Order_ID, Product_ID, Quantity_Ip);
END
//
delimiter //;


-- 2. Chinh sua chi tiét don dat hang
delimiter //
//
CREATE PROCEDURE proc_orderdetail_updateProduct(
    IN OrderDetail_ID int,
    IN Product_ID int,
    IN Quantity_Ip INT)
BEGIN
    update orderdetail set ProductID = Product_ID, Quantity = Quantity_Ip where OrderDetailID = OrderDetail_ID;
end
//
delimiter //;


-- 3.Select theo OrderID (OK)
delimiter //
//
CREATE PROCEDURE proc_orderdetail_selecOrderID(
    IN OrderID_ip int)
BEGIN
    select * from orderdetail where OrderID = OrderID_ip;

END
//
delimiter //;

-- 3.Select theo OrderID (OK)
delimiter //
//
CREATE PROCEDURE proc_orderdetail_selecOrderDetailID(
    IN id int)
BEGIN
    select * from orderdetail where OrderDetailID = id;

END
//
delimiter //;
-- 4. xóa orderdetails
delimiter //
//
CREATE PROCEDURE proc_orderdetail_delete(
    IN id int)
BEGIN
    delete from orderdetail where OrderDetailID = id;

END
//
delimiter //;


-- Customer

delimiter //
//
CREATE PROCEDURE proc_customer_insert(
    In code int,
    IN name varchar(50),
    In phone int,
    In address varchar(200)

)
BEGIN
    insert into customer (CustomerCode, order_name, order_phone, order_address) value (code, name, phone, address);
END
//
delimiter //;

delimiter //
//
CREATE PROCEDURE proc_customer_selectAll()

BEGIN
    select * from customer;
END
//
delimiter //;

delimiter //
//
CREATE PROCEDURE proc_customer_selectID(
    in id int
)

BEGIN
    select * from customer where CustomerCode = id;
END
//
delimiter //;

CREATE PROCEDURE proc_customer_update(
    in id int, in name varchar(50), in address varchar(200), in phone int
)

BEGIN
    update customer
    set Order_Name=name,
        Order_Address = address,
        Order_Phone = phone
    where CustomerCode = id ;

END;
delimiter //;