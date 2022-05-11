-- kiểm tra và hoàn thiện stored sau:
use fashion_website;
-- 2.Tạo proc insert tài khoản admin
DELIMITER //
CREATE PROCEDURE proc_admin_insert(
	IN AdminID CHAR(10),
	IN UserName VARCHAR(50),
	IN Admin_Password VARCHAR(50),
	IN Admin_Name VARCHAR(100))
BEGIN
	INSERT INTO Admins(AdminID,UserName,Admin_Password,Admin_Name)
		VALUES (AdminID,UserName,Admin_Password,Admin_Name);
END //
DELIMITER ;

--3.Tạo proc insert các hãng vận chuyển
DELIMITER //
CREATE PROCEDURE proc_transport_insert(
	IN TransportID CHAR(8),
	IN CompanyName VARCHAR(100),
	IN Phone VARCHAR(15))
BEGIN
	INSERT INTO Transport(TransportID,CompanyName,Phone)
		VALUES (TransportID,CompanyName,Phone);
END //
DELIMITER ;

-- 4.Tạo proc insert các hình thức thanh toán
DELIMITER //
CREATE PROCEDURE proc_payment_insert(
	IN PaymentID CHAR(8),
	IN PaymentMethod_Name VARCHAR(50))
BEGIN
	INSERT INTO Payment(PaymentID,PaymentMethod_Name)
		VALUES (PaymentID,PaymentMethod_Name);
END //
DELIMITER ;

--2. Tạo proc hiển thị toàn bộ thuộc tính và hình ảnh của mỗi product ( atribute, images, product)
DELIMITER //
CREATE PROCEDURE proc_ProductAttributePicture_select(
	IN Product_ID CHAR(8))
BEGIN 
	SELECT Product.ProductID, Product.Product_Name, Images.Picture_Name, Images.Picture_Link, Attribute.Attribute_Name
		FROM Product,Images,Attribute
			WHERE Images.PictureID = Product.PictureID AND Attribute.AttributeID = Product.AttributeID AND Product.ProductID = Product_ID;
END //
DELIMITER ;
--HIỂN THỊ ĐƠN HÀNG
--1. Tạo proc hiển thị đơn hàng order ( ngày đặt, vận chuyển, tên người nhận hàng), ( Orders, customer)
DELIMITER //
CREATE PROCEDURE proc_OrderCustomer_select(
	IN Order_ID CHAR(8))
BEGIN
	SELECT Orders.OrderID, Customer.Customer_Name, Transport.CompanyName
		FROM Orders, Customer, Transport
			WHERE Customer.CustomerID = Orders.CustomerID AND Transport.TransportID = Orders.TransportID AND Orders.OrderID = Order_ID;
END //
DELIMITER ;

-- hiển thị đơn hàng theo khác hàng
-- 4.Tạo proc hiển thị đơn hàng theo ID khách hàng proc_customerOrders_getdata(Customer_ID CHAR(8))
-- đã test ok
DELIMITER //
CREATE PROCEDURE proc_customerOrders_getdata(
 	IN Customer_ID CHAR(8)
 	)
BEGIN
	SELECT a.CustomerID, b.OrderID, d.PaymentMethod_Name, e.CompanyName, c.Order_Name, c.Order_Phone, c.Order_Address, f.Product_Name, c.Product_Quantity, g.Discount_Name
	FROM Customer a, Orders b, OrderDetail c, Payment d,Transport e, Product f, Discount g
	WHERE a.CustomerID = b.CustomerID and b.PaymentID =  d.PaymentID and b.TransportID = e.TransportID and b.OrderID = c. OrderID and c.DiscountID = g.DiscountID and c.ProductID = f.ProductID and a.CustomerID = Customer_ID;
		
END //
DELIMITER ;
 CALL  proc_customerOrders_getdata('CUS12345');