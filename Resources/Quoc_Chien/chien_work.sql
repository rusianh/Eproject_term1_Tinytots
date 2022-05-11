-- kiem tra va hoan thien cac store sau

--TẠO TÀI KHOẢN 
--1.Tạo proc insert tài khoản khách hàng
DELIMITER //
CREATE PROCEDURE proc_customer_insert(
	IN CustomerID CHAR(8),
	IN Customer_Name VARCHAR(50),
	IN Customer_Email VARCHAR(50),
	IN Customer_Password VARCHAR(50),
	IN Phone VARCHAR(15),
	IN Address VARCHAR(200))
BEGIN
	INSERT INTO Customer(CustomerID,Customer_Name,Customer_Email,Customer_Password,Phone,Address,Created)
		VALUES (CustomerID,Customer_Name,Customer_Email,Customer_Password,Phone,Address,NOW());
END; //
DELIMITER ;

--CHỈNH SỬA LIST SẢN PHẨM 
--1.Tạo proc thay đổi tên category
DELIMITER //
CREATE PROCEDURE proc_category_update(
	IN Category_ID CHAR(8),
	IN Category_NameUpdate VARCHAR(50))
BEGIN
	UPDATE Category SET Category_Name = Category_NameUpdate WHERE CategoryID = Category_ID;
END //
DELIMITER ;

--2.Tạo proc thay đổi tên product, description
DELIMITER //
CREATE PROCEDURE proc_ProductandDescription_update(
	IN Product_ID CHAR(8),
	IN Product_NameUpdate VARCHAR(100),
	IN DescriptionUpdate VARCHAR(200))
BEGIN
	UPDATE Product SET Product_Name = Product_NameUpdate, Description = DescriptionUpdate 
		WHERE ProductID = Product_ID;
END //
DELIMITER ;

--3.Tạo proc thay đổi hình ảnh sản phẩm
DELIMITER //
CREATE PROCEDURE proc_image_update(
	IN Picture_ID CHAR(8),
	IN Picture_NameUpdate VARCHAR(50),
	IN Picture_LinkUpdate VARCHAR(100))
BEGIN
	UPDATE Images SET Picture_Name = Picture_NameUpdate, Picture_Link = Picture_LinkUpdate
		WHERE PictureID = Picture_ID;
END //
DELIMITER ;

--CHỈNH SỬA THUỘC TÍNH CỦA SẢN PHẨM 
--Tạo update value của mỗi thuộc tính của sản phẩm
DELIMITER //
CREATE PROCEDURE proc_valueattribute_update(
	IN AttributeValue_ID CHAR(8),
	IN ValueUpdate INT))
BEGIN
	UPDATE Attribute_Value SET Value = ValueUpdate WHERE AttributeValueID = AttributeValue_ID;
END //
DELIMITER ;

--HIỂN THỊ SẢN PHẨM
--1.Tạo proc hiển thị toàn bộ dòng sản phẩm ( category , product)
DELIMITER //
CREATE PROCEDURE proc_CategoryandProduct_select(
	IN Category_ID CHAR(8))
BEGIN
	SELECT Category.CategoryID, Category.Category_Name, Product.ProductID, Product.Product_Name
		FROM Category,Product
			WHERE Category.CategoryID = Category_ID AND Product.CategoryID = Category_ID;
END //
DELIMITER ;

--2.Tạo proc  hiển thị thông tin số đơn hàng order của khách hàng và trạng thái  ( customer, orders)
DELIMITER //
CREATE PROCEDURE proc_ordercustomerstatus_select(
	IN OrderDetail_ID CHAR(8))
BEGIN
	SELECT OrderDetail.OrderDetailID, OrderDetail.OrderID, OrderDetail.Order_Name, OrderDetail.Order_Phone,
	OrderDetail.Order_Address, Product.Product_Name, OrderDetail.Product_Quantity, Discount.Discount_Name, Orders.Status_Order
		FROM OrderDetail,Product,Discount,Orders
			WHERE Orders.OrderID = OrderDetailOrderID AND Product.ProductID = OrderDetail.ProductID AND Discount.DiscountID = OrderDetail.DiscountID
			AND OrderDetailID = OrderDetail_ID;
END //
DELIMITER ;