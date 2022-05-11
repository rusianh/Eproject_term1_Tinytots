-- kiem tra va hoan thien các stored sau

--TẠO ĐƠN HÀNG ORDER 
--1. Tạo proc tạo mới đơn hàng khách hàng order ( Orders, payment, Transport, Customer)
DELIMITER //
CREATE PROCEDURE proc_order_insert(
	IN OrderID CHAR(8),
	IN CustomerID CHAR(8),
	IN PaymentID CHAR(8),
	IN TransportID CHAR(8),
	IN Status_Order VARCHAR(20),
	IN Created_At DATETIME,
	IN Update_At DATETIME)
BEGIN
	INSERT INTO Orders(OrderID,CustomerID,PaymentID,TransportID,Status_Order,Created_At,Update_At)
		VALUES (OrderID,CustomerID,PaymentID,TransportID,Status_Order,Created_At,Update_At);
END //
DELIMITER ;

--2.Tạo proc tạo mới đơn hàng khách hàng order chi tiết  ( Orders, payment, Transport, Customer)
DELIMITER //
CREATE PROCEDURE proc_OrderDetail_insert(
	IN OrderDetailID CHAR(8),
	IN OrderID CHAR(8),
	IN Order_Name VARCHAR(50),
	IN Order_Phone VARCHAR(15),
	IN Order_Address VARCHAR(200),
	IN ProductID CHAR(8),
	IN Product_Quantity INT,
	IN DiscountID CHAR(8))
BEGIN
	INSERT INTO OrderDetail(OrderDetailID,OrderID,Order_Name,Order_Phone,Order_Address,ProductID,Product_Quantity,DiscountID)
		VALUES (OrderDetailID,OrderID,Order_Name,Order_Phone,Order_Address,ProductID,Product_Quantity,DiscountID);
END //
DELIMITER ;

--HIỂN THỊ THÔNG TIN TÀI KHOẢN KHÁCH HÀNG
--1.Tạo proc hiển thị toàn bộ thông tin tài khoản khách hàng
DELIMITER //
CREATE PROCEDURE proc_customer_select(
	IN Customer_ID CHAR(8))
BEGIN
	SELECT CustomerID, Customer_Name, Customer_Email, Customer_Password, Phone, Address, Created
		FROM Customer
			WHERE CustomerID = Customer_ID;
END //
DELIMITER ;

--HIỂN THỊ THÔNG TIN KHÁC 
--1. Proc hiển thị transport 
DELIMITER //
CREATE PROCEDURE proc_transport_select(
	IN Transport_ID CHAR(8))
BEGIN 
	SELECT TransportID, CompanyName, Phone
		FROM Transport
			WHERE TransportID = Transport_ID;
END //
DELIMITER ;

--2.Proc hiển thị payment
DELIMITER //
CREATE PROCEDURE proc_payment_select(
	IN Payment_ID CHAR(8))
BEGIN
	SELECT PaymentID, PaymentMethod_Name
		FROM Payment
			WHERE PaymentID = Payment_ID;
END //
DELIMITER ;